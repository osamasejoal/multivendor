<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, ProfileController, FrontendController};

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



/*
|--------------------------------------------------------------------------
| HomeController
|--------------------------------------------------------------------------
*/
//
Route::get('/home', [HomeController::class, 'index'])->name('home');



/*
|--------------------------------------------------------------------------
| ProfileController
|--------------------------------------------------------------------------
*/
//
Route::get('/users/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/users/profile/update', [ProfileController::class, 'update'])->name('profile.update');



/*
|--------------------------------------------------------------------------
| FrontendController
|--------------------------------------------------------------------------
*/
//
Route::get('/', [FrontendController::class, 'frontpage'])->name('frontpage');
Route::resource('users', FrontendController::class);