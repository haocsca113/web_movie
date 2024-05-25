<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Movie_Genre;
use App\Models\Movie_Category;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Episode;
use App\Models\LinkMovie;
use Carbon\Carbon;

class LeechMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function leech_movie(){
        $resp = Http::get("https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=1")->json();
        return view('admincp.leech.index', compact('resp'));
    }

    public function leech_episode($slug){
        $resp = Http::get("https://ophim1.com/phim/".$slug)->json();
        return view('admincp.leech.leech_episode', compact('resp'));
    }

    public function leech_detail($slug){
        $resp = Http::get("https://ophim1.com/phim/".$slug)->json();
        $resp_movie[] = $resp['movie'];
        return view('admincp.leech.leech_detail', compact('resp_movie'));
    }

    public function leech_episode_store(Request $request, $slug){
        $movie = Movie::where('slug', $slug)->first();
        $resp = Http::get("https://ophim1.com/phim/".$slug)->json();
        foreach($resp['episodes'] as $key => $res){
            foreach($res['server_data'] as $key_data => $res_data){
                $episode = new Episode();
                $episode->movie_id = $movie->id;
                $episode->linkphim = '<p><iframe allowfullscreen frameborder="0" height="360" width="100%" scrolling="0" src="'.$res_data['link_embed'].'" ></iframe></p>';
                $episode->episode = $res_data['name'];
                if($key_data == 0){
                    $linkmovie = LinkMovie::orderBy('id', 'DESC')->first();
                    $episode->server = $linkmovie->id;
                }
                else{
                    $linkmovie = LinkMovie::orderBy('id', 'ASC')->first();
                    $episode->server = $linkmovie->id;
                }
                $episode->save();
            }
        }
        return redirect()->back();
    }

    public function leech_store(Request $request, $slug){
        $resp = Http::get("https://ophim1.com/phim/".$slug)->json();
        $resp_movie[] = $resp['movie'];
        $movie = new Movie();
        foreach($resp_movie as $key => $res){
            $movie->title = $res['name'];
            $movie->trailer = $res['trailer_url'];   
            $movie->sotap = $res['episode_total'];
            $movie->tags = $res['name'].','.$res['slug'];
            $movie->thoiluong = $res['time'];
            $movie->phude = 0;
            $movie->resolution = 0;
            $movie->name_eng = $res['origin_name'];
            $movie->phim_hot = 1;
            $movie->slug = $res['slug'];
            $movie->description = $res['content'];

            $movie->status = 1;
            $movie->thuocphim = 'phimle';

            $movie->count_views = rand(100, 99999);
            
            $category = Category::orderBy('id', 'DESC')->first();
            $movie->category_id = $category->id;

            $genre = Genre::orderBy('id', 'DESC')->first();
            $movie->genre_id = $genre->id;

            $country = Country::orderBy('id', 'DESC')->first();
            $movie->country_id = $country->id;

            $movie->ngaytao = Carbon::now('Asia/Ho_Chi_Minh');
            $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
            $movie->image = $res['thumb_url'];

            $movie->save();

            $movie->movie_genre()->attach($genre);
            $movie->movie_category()->attach($category);
        }
        return redirect()->back();
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
