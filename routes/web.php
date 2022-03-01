<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminPersonController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\CommentNewsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OneCategoryNewsController;
use App\Http\Controllers\OneNewsController;
use App\Http\Controllers\PersonAccountController;
use App\Http\Controllers\PersonalAccountController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/personal', [PersonAccountController::class, 'personalForm'])->name('personal_form');
Route::post('/personal', [PersonAccountController::class, 'update'])->name('update');

Route::group(['prefix'=>'social'], function (){
   Route::post('/login', [SocialController::class, 'loginSocial'])->name('login_social');
   Route::get('/response', [SocialController::class, 'responseVK'])->name('response_vk');
   Route::get('/responseFB', [SocialController::class, 'responseFB'])->name('response_fb');
});


Route::get('/', [Controller::class, 'index'])->name('home_all');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [OneCategoryNewsController::class, 'oneCategory'])->name('one_category');
Route::get('/category', [CategoryNewsController::class, 'category'])->name('all_category');
Route::get('/{idNews}', [OneNewsController::class, 'oneNews'])->name('one_news');
Route::get('/locale/{locale}', [Controller::class, 'changeLocale'])->name('locale');

Route::middleware('auth')
    ->group(function () {
        Route::get('/comment/{newsID}', [CommentNewsController::class, 'showForm'])->name('show_form');
        Route::post('/comment', [CommentNewsController::class, 'comment'])->name('comment');
    });

Route::middleware('role:admin')
    ->prefix('admin')
    ->group(function () {
        Route::resource('news', AdminNewsController::class);
        Route::resource('category', AdminCategoryController::class);
        Route::resource('person', AdminPersonController::class);
        Route::get('index', [AdminController::class, 'index'])->name('home_admin');
        Route::get('parser', [ParserController::class, 'index'])->name('parser');
    });

