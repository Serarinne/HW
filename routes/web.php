<?php

use App\Http\Controllers\WallpaperController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::view('/about', 'pages.about-us')->name('about');
Route::view('/privacy-policy', 'pages.privacy')->name('privacy');
Route::view('/terms-of-service', 'pages.tos')->name('tos');
Route::view('/contact', 'pages.contact')->name('contact');

$slugPattern = '[a-z0-9\-]+';

Route::controller(WallpaperController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/search', 'search')->name('wallpapers.search');
});

Route::controller(SitemapController::class)->group(function () {
    Route::get('/sitemap.xml', 'index');
    Route::get('/sitemap-wallpapers.xml', 'wallpaperIndex');
    Route::get('/sitemap-wallpapers-{page}.xml', 'wallpapers')->whereNumber('page');
    Route::get('/sitemap-characters.xml', 'characterIndex');
    Route::get('/sitemap-characters-{page}.xml', 'characters')->whereNumber('page');
    Route::get('/sitemap-tags.xml', 'tagIndex');
    Route::get('/sitemap-tags-{page}.xml', 'tags')->whereNumber('page');
});

Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login/firebase', 'firebaseLogin')->name('login.firebase');
});

Route::prefix('posts')->name('posts.')->controller(PostController::class)->group(function () use ($slugPattern) {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}', 'show')->name('show')->where('slug', $slugPattern);
});

Route::prefix('tags')->name('tags.')->controller(TagController::class)->group(function () use ($slugPattern) {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}', 'show')->name('show')->where('slug', $slugPattern);
});

Route::prefix('artists')->name('artists.')->controller(ArtistController::class)->group(function () use ($slugPattern) {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}', 'show')->name('show')->where('slug', $slugPattern);
});

Route::prefix('characters')->name('characters.')->controller(CharacterController::class)->group(function () use ($slugPattern) {
    Route::get('/', 'index')->name('index');
    Route::get('/{character:slug}', 'show')->name('show')->where('character', $slugPattern);
});

Route::middleware(['auth'])->group(function () {
    Route::controller(FavoriteController::class)->group(function () {
        Route::get('/favorites', 'index')->name('favorites.index');
        Route::post('/wallpapers/{id}/favorite', 'toggle')->name('wallpapers.favorite')->whereNumber('id');
    });
    
    Route::prefix('settings')->name('settings.')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
    });
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

require __DIR__.'/admin.php';

Route::controller(WallpaperController::class)->group(function () use ($slugPattern) {
    Route::get('/{id}', 'redirectToSlug')->whereNumber('id')->name('wallpapers.redirect');
    Route::get('/{slug}', 'show')->name('wallpapers.show')->where('slug', $slugPattern);
});