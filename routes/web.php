<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
//admin controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LinkMovieController;
use App\Http\Controllers\LeechMovieController;
use App\Http\Controllers\LoginGoogleController;
use App\Http\Controllers\LoginFBController;
use App\Http\Controllers\DetectAttackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');

Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}/{server_active}', [IndexController::class, 'watch']);
Route::get('/so-tap', [IndexController::class, 'episode'])->name('so-tap');
Route::get('/nam/{year}', [IndexController::class, 'year']);
Route::get('/tag/{tag}', [IndexController::class, 'tag']);
Route::get('/tim-kiem', [IndexController::class, 'timkiem'])->name('tim-kiem');
Route::get('/locphim', [IndexController::class, 'locphim'])->name('locphim');
Route::post('/add-rating', [IndexController::class, 'add_rating'])->name('add-rating');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//route admin
Route::post('resorting', [CategoryController::class, 'resorting'])->name('resorting');
Route::resource('category', CategoryController::class);

Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('movie', MovieController::class);
Route::resource('info', InfoController::class);
Route::resource('linkmovie', LinkMovieController::class);
//them tap phim
Route::get('add-episode/{id}', [EpisodeController::class, 'add_episode'])->name('add-episode');
Route::resource('episode', EpisodeController::class);
Route::get('select-movie', [EpisodeController::class, 'select_movie'])->name('select-movie');

Route::get('/update-year-phim', [MovieController::class, 'update_year']);
Route::post('/update-season-phim', [MovieController::class, 'update_season']);
Route::get('/update-topview-phim', [MovieController::class, 'update_topview']);
Route::post('/filter-topview-phim', [MovieController::class, 'filter_topview']);
Route::get('/filter-topview-default', [MovieController::class, 'filter_default']);
Route::get('/filter-topview-default', [MovieController::class, 'filter_default']);
Route::get('/sort-movie', [MovieController::class, 'sort_movie'])->name('sort-movie');
Route::post('/resorting-navbar', [MovieController::class, 'resorting_navbar'])->name('resorting-navbar');
Route::post('/resorting-movie', [MovieController::class, 'resorting_movie'])->name('resorting-movie');

//thay doi du lieu movie bang ajax
Route::get('/category-choose', [MovieController::class, 'category_choose'])->name('category-choose');
Route::get('/country-choose', [MovieController::class, 'country_choose'])->name('country-choose');
Route::get('/phimhot-choose', [MovieController::class, 'phimhot_choose'])->name('phimhot-choose');
Route::get('/phude-choose', [MovieController::class, 'phude_choose'])->name('phude-choose');
Route::get('/trangthai-choose', [MovieController::class, 'trangthai_choose'])->name('trangthai-choose');
Route::get('/thuocphim-choose', [MovieController::class, 'thuocphim_choose'])->name('thuocphim-choose');
Route::get('/resolution-choose', [MovieController::class, 'resolution_choose'])->name('resolution-choose');
Route::post('/update-image-movie-ajax', [MovieController::class, 'update_image_movie_ajax'])->name('update-image-movie-ajax');
Route::post('/watch-video', [MovieController::class, 'watch_video'])->name('watch-video');

// Login by google account
Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('login-by-google');
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);
Route::get('logout-home', [LoginGoogleController::class, 'logout_home'])->name('logout-home');

// Login by facebook account
Route::get('auth/facebook', [LoginFBController::class, 'redirectToFacebook'])->name('login-by-facebook');
Route::get('auth/facebook/callback', [LoginFBController::class, 'handleFacebookCallback']);

// route leech movie
Route::get('leech-movie', [LeechMovieController::class, 'leech_movie'])->name('leech-movie');
Route::get('leech-detail/{slug}', [LeechMovieController::class, 'leech_detail'])->name('leech-detail');
Route::get('leech-episode/{slug}', [LeechMovieController::class, 'leech_episode'])->name('leech-episode');
Route::post('leech-store/{slug}', [LeechMovieController::class, 'leech_store'])->name('leech-store');
Route::post('leech-episode-store/{slug}', [LeechMovieController::class, 'leech_episode_store'])->name('leech-episode-store');

// ajax chi tiet phim
Route::post('watch-leech-detail', [LeechMovieController::class, 'watch_leech_detail'])->name('watch-leech-detail');

//********* Detect Attack ************
Route::get('/home/detect-attack-home', [DetectAttackController::class, 'detect_attack_home'])->name('detect-attack-home');

// Brute Force Attack
Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:login');

Route::post('/home/detect-attack-home/destroy-detect-attack/{id}', [DetectAttackController::class, 'destroy_detect_attack'])->name('destroy-detect-attack');

// Tìm kiếm bằng hình ảnh
Route::post('/search/image', [IndexController::class, 'searchByImage'])->name('search.image');





