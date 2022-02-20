<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CartController, HomeController, ProfileController, FrontendController, CategoryController, SubCategoryController, ProductController, WishlistController, CompanyInfoController, CompanySocialController, BannerController, TestimonialController, VendorController};
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

Route::get('/cart/add/{id}', [CartController::class, 'index'])->name('add.cart');

Route::get('/cart/delete/{id}', [CartController::class, 'delete'])->name('delete.cart');

Route::get('/carts/view', [CartController::class, 'view'])->name('view.carts');






/*
|--------------------------------------------------------------------------
| WishlistController
|--------------------------------------------------------------------------
*/
//
Route::get('/wishlist/add/{id}', [WishlistController::class, 'index'])->name('add.wishlist');

Route::get('/wishlist/delete/{id}', [WishlistController::class, 'delete'])->name('delete.wishlist');

Route::get('/wishlist/view', [WishlistController::class, 'view'])->name('view.wishlist');





/*
|--------------------------------------------------------------------------
| CompanyInfoController
|--------------------------------------------------------------------------
*/
//
Route::get('/company/profile', [CompanyInfoController::class, 'index'])->name('edit.company');

Route::post('/company/profile/update/{id}', [CompanyInfoController::class, 'update'])->name('update.company');





/*
|--------------------------------------------------------------------------
| CompanySocialController
|--------------------------------------------------------------------------
*/
//
Route::resource('company-social', CompanySocialController::class);





/*
|--------------------------------------------------------------------------
| BannerController
|--------------------------------------------------------------------------
*/
//
Route::resource('banner', BannerController::class);





/*
|--------------------------------------------------------------------------
| TestimonialController
|--------------------------------------------------------------------------
*/
//
Route::resource('testimonial', TestimonialController::class);





/*
|--------------------------------------------------------------------------
| VendorController
|--------------------------------------------------------------------------
*/
//
Route::resource('vendor', VendorController::class);

