<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\Movie_Category;
use App\Models\Rating;
use App\Models\Info;
use App\Models\LinkMovie;
use App\Models\Frame;
use DB;
use Imagick;

class IndexController extends Controller
{
    public function locphim(){
        $order = $_GET['order'];
        $genre_get = $_GET['genre'];
        $country_get = $_GET['country'];
        $year_get = $_GET['year'];

        if($order == '' && $genre_get == '' && $country_get == '' && $year_get == ''){
            
            return redirect()->back();      
        }
        else{
            $meta_title = 'Lọc theo phim.';
            $meta_description = 'Lọc theo phim.';

            $movie_array = Movie::withCount('episode'); // lấy ra phim và đếm số tập
            
            if($country_get){ // có lọc quốc gia
                $movie_array = $movie_array->where('country_id', $country_get);
            }
            if($year_get){
                $movie_array = $movie_array->where('year', $year_get);
            }
            if($order){
                $movie_array = $movie_array->orderBy($order, 'DESC');
            }

            $movie_array = $movie_array->with('movie_genre');
            $movie = array();
            foreach($movie_array as $mov){
                foreach($mov->movie_genre as $mov_gen){
                    $movie = $movie_array->whereIn('genre_id', [$mov_gen->genre_id]);
                }
            }
            $movie = $movie_array->paginate(40);

            return view('pages.locphim', compact('movie', 'meta_title', 'meta_description'));
        }
    }

    public function timkiem(){
        if(isset($_GET['search']))
        {
            $meta_title = 'Tìm theo phim.';
            $meta_description = 'Tìm theo phim.';
            $search = $_GET['search'];
            // $search = filter_var($_GET['search'], FILTER_SANITIZE_STRING); //loc du lieu dau vao khong chua ki tu dac biet

            $movie = Movie::withCount('episode')->where('title', 'LIKE', '%'.$search.'%')->orderBy('ngaycapnhat', 'DESC')->paginate(40);

            return view('pages.timkiem', compact('search', 'movie', 'meta_title', 'meta_description'));
        }
        else
        {
            return redirect()->to('/');
        }        
    }

    public function searchByImage(Request $request){
        // // Tìm phim dựa trên kết quả phân tích
        // $movies = Movie::where('title', 'like', '%' . $result . '%')
        //                ->orWhere('actors', 'like', '%' . $result . '%')
        //                ->get();

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Lưu ảnh tải lên vào thư mục tạm
        $uploadedImagePath = $request->file('image')->store('temp', 'public');
        $imagePath = storage_path('app/public/' . $uploadedImagePath);

        // Kiểm tra xem tệp có tồn tại không
        if (!file_exists($imagePath)) {
            return response()->json([
                'success' => false,
                'message' => 'Tệp hình ảnh không tồn tại.',
            ], 400);
        }
    
        try {
            // Gọi hàm tìm kiếm phim
            $movie = $this->findMovieByImage($imagePath);
    
            if ($movie) {
                return response()->json([
                    'success' => true,
                    'movie' => $movie,
                ]);
            }
    
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy bộ phim tương ứng.',
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi xử lý: ' . $e->getMessage(),
            ], 500);
        }
    }

    function calculateImageSimilarity($imagePath1, $imagePath2)
    {
        set_time_limit(0);
        if (!file_exists($imagePath1) || !file_exists($imagePath2)) {
            throw new \Exception('Một trong hai tệp hình ảnh không tồn tại.');
        }

        try {
            $image1 = new \Imagick($imagePath1);
            $image2 = new \Imagick($imagePath2);

            // Resize hình ảnh
            $image1->resizeImage(256, 256, Imagick::FILTER_LANCZOS, 1);
            $image2->resizeImage(256, 256, Imagick::FILTER_LANCZOS, 1);

            // Lấy histogram
            $image1Histogram = $image1->getImageHistogram();
            $image2Histogram = $image2->getImageHistogram();

            // Tính toán độ tương đồng
            $similarity = 0;
            foreach ($image1Histogram as $key => $value) {
                $similarity += abs($value->getColorValue(Imagick::COLOR_RED) -
                    $image2Histogram[$key]->getColorValue(Imagick::COLOR_RED));
            }

            return $similarity;
        } catch (\Exception $e) {
            throw new \Exception('Lỗi xử lý hình ảnh: ' . $e->getMessage());
        }
    }

    // function calculateImageSimilarity($imagePath1, $imagePath2)
    // {
    //     set_time_limit(0);

    //     if (!file_exists($imagePath1) || !file_exists($imagePath2)) {
    //         throw new \Exception('Một trong hai tệp hình ảnh không tồn tại.');
    //     }

    //     try {
    //         $image1 = new \Imagick($imagePath1);
    //         $image2 = new \Imagick($imagePath2);

    //         // Resize ảnh nhỏ hơn để giảm dữ liệu
    //         $image1->resizeImage(16, 16, Imagick::FILTER_LANCZOS, 1);
    //         $image2->resizeImage(16, 16, Imagick::FILTER_LANCZOS, 1);

    //         // Lấy giá trị màu trung bình
    //         $averageColor1 = $image1->getImageStatistics();
    //         $averageColor2 = $image2->getImageStatistics();

    //         // Tính toán độ tương đồng (sử dụng khoảng cách Euclidean)
    //         $similarity = sqrt(
    //             pow($averageColor1['red']['mean'] - $averageColor2['red']['mean'], 2) +
    //             pow($averageColor1['green']['mean'] - $averageColor2['green']['mean'], 2) +
    //             pow($averageColor1['blue']['mean'] - $averageColor2['blue']['mean'], 2)
    //         );

    //         return $similarity;
    //     } catch (\Exception $e) {
    //         throw new \Exception('Lỗi xử lý hình ảnh: ' . $e->getMessage());
    //     }
    // }

    public function findMovieByImage($uploadedImagePath)
    {
        $frames = Frame::all(); // Lấy tất cả khung hình từ DB
        $bestMatch = null;
        $highestSimilarity = PHP_INT_MAX;

        foreach ($frames as $frame) {
            // $framePath = public_path($frame->frame_path);

            $framePath = storage_path('app/public/'. $frame->frame_path);

            if (!file_exists($framePath)) {
                continue; // Bỏ qua tệp không tồn tại
            }

            try {
                $similarity = $this->calculateImageSimilarity($uploadedImagePath, $framePath);
    
                if ($similarity < $highestSimilarity) {
                    $highestSimilarity = $similarity;
                    $bestMatch = $frame;
                }
    
            } catch (\Exception $e) {
                // Ghi log lỗi hoặc bỏ qua khung hình bị lỗi
                \Log::error('Lỗi so sánh hình ảnh: ' . $e->getMessage());
                continue;
            }
        }

        if ($bestMatch) {
            return Movie::find($bestMatch->movie_id);
        }

        return null;
    }


    public function home(){
        $info = Info::find(1);
        // $info = "select * from info where id = 1";
        $meta_title = $info->title;
        $meta_description = $info->description;

        $phimhot = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->get();
        $category_home = Category::with(['movie'=> function($q){ $q->withCount('episode')->where('status', 1); }])->orderBy('position', 'ASC')->where('status', 1)->get();
        return view('pages.home', compact('category_home', 'phimhot', 'meta_title', 'meta_description'));
        // return view('pages.home', compact('category_home', 'phimhot'));
    }

    public function category($slug){
        $cate_slug = Category::where('slug', $slug)->first();
        $meta_title = $cate_slug->title;
        $meta_description = $cate_slug->description;

        //nhieu danh muc
        $movie_category = Movie_category::where('category_id', $cate_slug->id)->get();
        $many_category = [];
        foreach($movie_category as $key => $movi){
            $many_category[] = $movi->movie_id;
        }

        $movie = Movie::withCount('episode')->whereIn('id', $many_category)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        return view('pages.category', compact('cate_slug', 'movie', 'meta_title', 'meta_description'));
    }

    public function year($year){
        $year = $year;
        $meta_title ='Năm phim: '.$year;
        $meta_description = 'Tìm phim năm: '.$year;

        $movie = Movie::withCount('episode')->where('year', $year)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        return view('pages.year', compact('year', 'movie', 'meta_title', 'meta_description'));
    }

    public function tag($tag){
        $tag = $tag;
        $meta_title = $tag;
        $meta_description = $tag;

        $movie = Movie::withCount('episode')->where('tags', 'LIKE', '%'.$tag.'%')->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        return view('pages.tag', compact('tag', 'movie', 'meta_title', 'meta_description'));
    }

    public function genre($slug){
        $gen_slug = Genre::where('slug', $slug)->first();
        $meta_title = $gen_slug->title;
        $meta_description = $gen_slug->description;

        //nhieu the loai
        $movie_genre = Movie_Genre::where('genre_id', $gen_slug->id)->get();
        $many_genre = [];
        foreach($movie_genre as $key => $movi){
            $many_genre[] = $movi->movie_id;
        }
        // return response()->json($many_genre);
        $movie = Movie::withCount('episode')->whereIn('id', $many_genre)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        return view('pages.genre', compact('gen_slug', 'movie', 'meta_title', 'meta_description'));
    }

    public function country($slug){
        // $slug = htmlspecialchars($slug, ENT_QUOTES, 'UTF-8');

        $count_slug = DB::select("SELECT * FROM countries where slug = '$slug'"); // raw query
        if($count_slug) {
            $meta_title = $count_slug[0]->title;
            $meta_description = $count_slug[0]->description;
            $country_ids = array_map(fn($country) => $country->id, $count_slug);
            $movie = Movie::withCount('episode')
              ->whereIn('country_id', $country_ids)
              ->orderBy('ngaycapnhat', 'DESC')
              ->paginate(40);
            // $movie = Movie::withCount('episode')->where('country_id', $count_slug[0]->id)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        }
        else {
            $meta_title = "Không tìm thấy bản ghi phù hợp";
            $meta_description = "Không tìm thấy bản ghi phù hợp";
            $movie = collect([]);
        }

        // $count_slug = Country::where('slug', $slug)->first();
        // if($count_slug) {
        //     $meta_title = $count_slug->title;
        //     $meta_description = $count_slug->description;
        //     $movie = Movie::withCount('episode')->where('country_id', $count_slug->id)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        // }
        // else {
        //     $meta_title = "Không tìm thấy bản ghi phù hợp";
        //     $meta_description = "Không tìm thấy bản ghi phù hợp";
        //     $movie = collect([]);
        // }

        return view('pages.country', compact('count_slug', 'movie', 'meta_title', 'meta_description'));
    }


    public function movie($slug){
        $movie = Movie::with('category', 'genre', 'country', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();
        $meta_title = $movie->title;
        $meta_description = $movie->description;
        
        $episode_tapdau = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'ASC')->take(1)->first();

        $related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();

        //lay 3 tap gan nhat
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'DESC')->take(3)->get();
        //lay tong tap phim da them
        $episode_current_list = Episode::with('movie')->where('movie_id', $movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();
        
        //rating movie
        $rating = Rating::where('movie_id', $movie->id)->avg('rating');
        $rating = round($rating);
        $count_total = Rating::where('movie_id', $movie->id)->count();
        
        //increase movie views
        $count_views = $movie->count_views;
        $count_views += 1;
        $movie->count_views = $count_views;
        $movie->save();

        return view('pages.movie', compact('movie', 'related', 'episode', 'episode_tapdau', 'episode_current_list_count', 'rating', 'count_total', 'meta_title', 'meta_description'));
    }

    public function add_rating(Request $request){
        $data = $request->all();
        $ip_address = $request->ip();

        $rating_count = Rating::where('movie_id', $data['movie_id'])->where('ip_address', $ip_address)->count();
        if($rating_count > 0){
            echo 'exist';
        }
        else{
            $rating = new Rating();
            $rating->movie_id = $data['movie_id'];
            $rating->rating = $data['index'];
            $rating->ip_address = $ip_address;
            $rating->save();
            echo 'done';
        }
    }

    public function watch($slug, $tap, $server_active){
        $movie = Movie::with('category', 'genre', 'country', 'movie_genre', 'movie_category', 'episode')->where('slug', $slug)->where('status', 1)->first();
        // return response()->json($movie);
        $meta_title = 'Xem phim: '.$movie->title;
        $meta_description = $movie->description;

        $related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();

        //lay tap 1 
        if(isset($tap)){
            $tapphim = $tap;
            $tapphim = substr($tap, 4,20);
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        }
        else{
            $tapphim = 1;
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        }

        $server = LinkMovie::orderBy('id', 'DESC')->get();
        $episode_movie = Episode::where('movie_id', $movie->id)->orderBy('episode', 'ASC')->get()->unique('server');
        $episode_list = Episode::where('movie_id', $movie->id)->orderBy('episode', 'ASC')->get();

        return view('pages.watch', compact('movie', 'episode', 'tapphim', 'related', 'meta_title', 'meta_description', 'server', 'episode_movie', 'episode_list', 'server_active'));
    }
    public function episode(){
        return view('pages.episode');
    }
}
