<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CartController, HomeController, ProfileController, FrontendController, CategoryController, SubCategoryController, ProductController, WishlistController, CompanyInfoController, CompanySocialController, BannerController, TestimonialController, VendorController, CustomerController, CouponController, CheckoutController, AreaController};
use App\Models\SubCategory;
use Facade\FlareClient\Http\Response;
use Symfony\Component\Console\Input\Input;

// For payment gateway method
use App\Http\Controllers\SslCommerzPaymentController;


Auth::routes();



/*
|--------------------------------------------------------------------------
| HomeController
|--------------------------------------------------------------------------
*/
Route::get('/home', [HomeController::class, 'index'])->name('home');



/*
|--------------------------------------------------------------------------
| ProfileController
|--------------------------------------------------------------------------
*/
Route::get('/users/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/users/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/customer/profile/update', [ProfileController::class, 'customer_profile'])->name('customer.profile.update');



/*
|--------------------------------------------------------------------------
| FrontendController
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendController::class, 'frontpage'])->name('frontpage');

Route::get('/category/wise/product/{id}', [FrontendController::class, 'categoryProduct'])->name('category.product');

Route::get('/single/product/{id}', [FrontendController::class, 'productPage'])->name('single.product');

Route::get('/deal/of/the/day', [FrontendController::class, 'dealOfTheDay'])->name('deal.day');



/*
|--------------------------------------------------------------------------
| CategoryController
|--------------------------------------------------------------------------
*/
Route::resource('category', CategoryController::class);



/*
|--------------------------------------------------------------------------
| SubCategoryController
|--------------------------------------------------------------------------
*/
Route::resource('sub-category', SubCategoryController::class);



/*
|--------------------------------------------------------------------------
| SubCategoryController
|--------------------------------------------------------------------------
*/
Route::resource('product', ProductController::class);



/*
|--------------------------------------------------------------------------
| CartController
|--------------------------------------------------------------------------
*/
Route::get('/cart/add/{id}', [CartController::class, 'index'])->name('add.cart');

Route::post('/product/page/cart/{id}', [CartController::class, 'productPageCart'])->name('product.page.cart');

Route::get('/cart/delete/{id}', [CartController::class, 'delete'])->name('delete.cart');

Route::get('/carts/view', [CartController::class, 'view'])->name('view.carts');

Route::post('/carts/update', [CartController::class, 'cartUpdate'])->name('cart.update');



/*
|--------------------------------------------------------------------------
| WishlistController
|--------------------------------------------------------------------------
*/
Route::get('/wishlist/add/{id}', [WishlistController::class, 'index'])->name('add.wishlist');

Route::get('/wishlist/delete/{id}', [WishlistController::class, 'delete'])->name('delete.wishlist');

Route::get('/wishlist/view', [WishlistController::class, 'view'])->name('view.wishlist');



/*
|--------------------------------------------------------------------------
| CompanyInfoController
|--------------------------------------------------------------------------
*/
Route::get('/company/profile', [CompanyInfoController::class, 'index'])->name('edit.company');

Route::post('/company/profile/update/{id}', [CompanyInfoController::class, 'update'])->name('update.company');



/*
|--------------------------------------------------------------------------
| CompanySocialController
|--------------------------------------------------------------------------
*/
Route::resource('company-social', CompanySocialController::class);



/*
|--------------------------------------------------------------------------
| BannerController
|--------------------------------------------------------------------------
*/
Route::resource('banner', BannerController::class);



/*
|--------------------------------------------------------------------------
| TestimonialController
|--------------------------------------------------------------------------
*/
Route::resource('testimonial', TestimonialController::class);



/*
|--------------------------------------------------------------------------
| VendorController
|--------------------------------------------------------------------------
*/
Route::resource('vendor', VendorController::class);



/*
|--------------------------------------------------------------------------
| CustomerController
|--------------------------------------------------------------------------
*/
Route::resource('customer', CustomerController::class);



/*
|--------------------------------------------------------------------------
| CouponController
|--------------------------------------------------------------------------
*/
Route::resource('coupon', CouponController::class);



/*
|--------------------------------------------------------------------------
| CheckoutController
|--------------------------------------------------------------------------
*/
Route::get('/check/out', [CheckoutController::class, 'view'])->name('checkout');
Route::post('/check/out', [CheckoutController::class, 'checkoutPost'])->name('checkout.post');
Route::post('/city/list', [CheckoutController::class, 'cityList'])->name('city.list');



/*
|--------------------------------------------------------------------------
| AreaController
|--------------------------------------------------------------------------
*/
Route::get('/add/country', [AreaController::class, 'addCountry'])->name('country.add');
Route::post('/store/country', [AreaController::class, 'storeCountry'])->name('country.store');
Route::get('/view/countries', [AreaController::class, 'viewCountries'])->name('country.view');
Route::post('/destroy/countries/{id}', [AreaController::class, 'destroyCountries'])->name('country.destroy');

Route::get('/add/city', [AreaController::class, 'addCity'])->name('city.add');
Route::post('/store/city', [AreaController::class, 'storeCity'])->name('city.store');
Route::get('/view/cities', [AreaController::class, 'viewCities'])->name('city.view');
Route::post('/destroy/cities/{id}', [AreaController::class, 'destroyCities'])->name('city.destroy');



/*
|--------------------------------------------------------------------------
| SslCommerzPaymentController (for payment gateway)
|--------------------------------------------------------------------------
*/
// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

