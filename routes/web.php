<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CartController, HomeController, ProfileController, FrontendController, CategoryController, SubCategoryController, ProductController, WishlistController, };
use App\Models\SubCategory;
use Facade\FlareClient\Http\Response;
use Symfony\Component\Console\Input\Input;

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

Route::get('/category/wise/product/{id}', [FrontendController::class, 'categoryProduct'])->name('category.product');

Route::get('/single/product/{id}', [FrontendController::class, 'productPage'])->name('single.product');

Route::get('/deal/of/the/day', [FrontendController::class, 'dealOfTheDay'])->name('deal.day');





/*
|--------------------------------------------------------------------------
| CategoryController
|--------------------------------------------------------------------------
*/
//
Route::resource('category', CategoryController::class);





/*
|--------------------------------------------------------------------------
| SubCategoryController
|--------------------------------------------------------------------------
*/
//
Route::resource('sub-category', SubCategoryController::class);





/*
|--------------------------------------------------------------------------
| SubCategoryController
|--------------------------------------------------------------------------
*/
//
Route::resource('product', ProductController::class);





/*
|--------------------------------------------------------------------------
| CartController
|--------------------------------------------------------------------------
*/
//
Route::resource('cart', CartController::class);

Route::get('/cart/add/{id}', [CartController::class, 'custom'])->name('add.cart');





/*
|--------------------------------------------------------------------------
| WishlistController
|--------------------------------------------------------------------------
*/
//
Route::get('/wishlist/add/{id}', [WishlistController::class, 'index'])->name('add.wishlist');





// Route::get('/ajax-subcat', function(){
//     $cat_id = Input::get('cat_id');

//     $subcategories = SubCategory::where('category_id', '=', $cat_id)->get();
    
//     return Response::json($subcategories);
// });