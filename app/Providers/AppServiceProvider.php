<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\Rating;
use App\Models\Info;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $phimhot_trailer = Movie::where('resolution', 5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();

        $info = Info::find(1);

        View::share([
            'info' => $info,
            'phimhot_sidebar' => $phimhot_sidebar,
            'phimhot_trailer' => $phimhot_trailer,
            'category_h' => $category,
            'genre_h' => $genre,
            'country_h' => $country,
        ]);
    }
}
