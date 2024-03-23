<?php

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

Route::get('/', [\App\Http\Controllers\FrontEndController::class, 'index']);

Route::post('/search/result', [\App\Http\Controllers\FrontEndController::class, 'searchResult']);

Route::get('/ajax-search/{id}', [\App\Http\Controllers\AjaxController::class, 'ajaxSearchCheck']);

Route::group(['middleware' => 'admin_middleware'], function () {
    Route::get('/category/add', [\App\Http\Controllers\CategoryController::class, 'addCategory']);

    Route::post('/category/save', [\App\Http\Controllers\CategoryController::class, 'saveCategory']);

    Route::get('/category/manage', [\App\Http\Controllers\CategoryController::class, 'manageCategory']);

    Route::get('/category/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'editCategory']);

    Route::post('/category/update', [\App\Http\Controllers\CategoryController::class, 'updateCategory']);

    Route::get('/category/unpublished/{id}', [\App\Http\Controllers\CategoryController::class, 'unpublishedCategory']);

    Route::get('/category/published/{id}', [\App\Http\Controllers\CategoryController::class, 'publishedCategory']);

    Route::get('/category/delete/{id}', [\App\Http\Controllers\CategoryController::class, 'deleteCategory']);

    Route::get('/hall/add', [\App\Http\Controllers\HallController::class, 'addHall']);



    Route::get('/foods/add', [\App\Http\Controllers\FoodsController::class, 'addFoods']);
    Route::get('/foods/manage', [\App\Http\Controllers\FoodsController::class, 'manageFoods']);
    Route::post('/foods/save', [\App\Http\Controllers\FoodsController::class, 'saveFoods']); 
    Route::get('/foods/edit/{id}', [\App\Http\Controllers\FoodsController::class, 'editFoods']); 
    Route::post('/foods/update', [\App\Http\Controllers\FoodsController::class, 'updateFoods']);
    Route::get('/foods/delete/{id}', [\App\Http\Controllers\FoodsController::class, 'deleteFoods']);


    Route::get('/report/manage', [\App\Http\Controllers\ReportController::class, 'manageReport']);

    Route::get('/foods/report', [\App\Http\Controllers\FoodsController::class, 'report']);




    Route::get('/seats/add', [\App\Http\Controllers\SeatsController::class, 'addSeats']);
    Route::get('/seats/manage', [\App\Http\Controllers\SeatsController::class, 'manageSeats']);
    Route::post('/seats/save', [\App\Http\Controllers\SeatsController::class, 'saveSeats']); 
    Route::get('/seats/edit/{id}', [\App\Http\Controllers\SeatsController::class, 'editSeats']); 
    Route::post('/seats/update', [\App\Http\Controllers\SeatsController::class, 'updateSeats']);
    Route::get('/seats/delete/{id}', [\App\Http\Controllers\SeatsController::class, 'deleteSeats']);



    Route::get('/hall/manage', [\App\Http\Controllers\HallController::class, 'manageHall']);

    Route::post('/hall/save', [\App\Http\Controllers\HallController::class, 'saveHall']);

    Route::get('/hall/unpublished/{id}', [\App\Http\Controllers\HallController::class, 'unpublishedHall']);

    Route::get('/hall/published/{id}', [\App\Http\Controllers\HallController::class, 'publishedHall']);

    Route::get('/hall/edit/{id}', [\App\Http\Controllers\HallController::class, 'editHall']);

    Route::post('/hall/update', [\App\Http\Controllers\HallController::class, 'updateHall']);

    Route::get('/hall/delete/{id}', [\App\Http\Controllers\HallController::class, 'deleteHall']);

    Route::get('/manage/booking', [\App\Http\Controllers\BookingController::class, 'manageBooking']);

    Route::get('/booking/details/{id}', [\App\Http\Controllers\BookingController::class, 'bookingDetails']);

    Route::get('/booking/invoice/{id}', [\App\Http\Controllers\BookingController::class, 'bookingInvoice']);

    Route::get('/booking/edit/{id}', [\App\Http\Controllers\BookingController::class, 'editBooking']);

    Route::post('/payment/update', [\App\Http\Controllers\BookingController::class, 'updatePaymentStatus']);

    Route::post('/booking/update', [\App\Http\Controllers\BookingController::class, 'updateBookingStatus']);

    Route::get('/booking/delete/{id}', [\App\Http\Controllers\BookingController::class, 'deleteBooking']);

    Route::get('/booking/invoice/download/{id}', [\App\Http\Controllers\BookingController::class, 'bookingInvoiceDownload']);

    Route::get('/manage/customer', [\App\Http\Controllers\CustomerManageController::class, 'manageCustomer']);

    Route::get('/customer/blocked/{id}', [\App\Http\Controllers\CustomerManageController::class, 'blockedCustomer']);

    Route::get('/customer/active/{id}', [\App\Http\Controllers\CustomerManageController::class, 'activeCustomer']);
});

Route::get('/category/hall/{id}', [\App\Http\Controllers\FrontEndController::class, 'categoryHall']);

Route::get('/hall/view/{id}', [\App\Http\Controllers\FrontEndController::class, 'viewHall']);

Route::post('/add-to-cart', [\App\Http\Controllers\CartController::class, 'addToCart']);

Route::get('/cart/show', [\App\Http\Controllers\CartController::class, 'showCart']);

Route::get('/cart/delete/{id}', [\App\Http\Controllers\CartController::class, 'deleteCart']);

Route::post('/cart/update', [\App\Http\Controllers\CartController::class, 'updateCart']);

Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'checkout']);

Route::post('/customer/signup', [\App\Http\Controllers\CheckoutController::class, 'customerSignup']);

Route::get('/ajax-email-check/{email}', [\App\Http\Controllers\AjaxController::class, 'ajaxEmailCheck']);

Route::post('/customer/login', [\App\Http\Controllers\CheckoutController::class, 'customerLogin']);

Route::get('/registration/confirmation', [\App\Http\Controllers\CheckoutController::class, 'registrationConfirmation']);

Route::get('/resend/code/{id}', [\App\Http\Controllers\CheckoutController::class, 'resendCode']);

Route::post('/account/verify', [\App\Http\Controllers\CheckoutController::class, 'accountVerify']);

Route::group(['middleware' => 'customer_middleware'], function () {

    Route::get('/checkout/shipping', [\App\Http\Controllers\CheckoutController::class, 'checkoutShipping']);

    Route::post('/shipping/save', [\App\Http\Controllers\CheckoutController::class, 'shippingSave']);

    Route::get('/checkout/payment', [\App\Http\Controllers\CheckoutController::class, 'checkoutPayment']);

    Route::post('/new/order', [\App\Http\Controllers\CheckoutController::class, 'newOrder']);

    Route::get('/complete/order', [\App\Http\Controllers\CheckoutController::class, 'completeOrder']);

    Route::get('/customer/dashboard', [\App\Http\Controllers\CustomerController::class, 'customerDashboard']);

    Route::get('/booking/cancelled/{id}', [\App\Http\Controllers\CustomerController::class, 'bookingCancelled']);

    Route::get('/customer/profile/{id}/{name}', [\App\Http\Controllers\CustomerController::class, 'customerProfile']);

    Route::post('/image/save', [\App\Http\Controllers\CustomerController::class, 'imageSave']);

    Route::get('/customer/edit/{id}', [\App\Http\Controllers\CustomerController::class, 'customerEdit']);

    Route::post('/customer/update', [\App\Http\Controllers\CustomerController::class, 'customerUpdate']);

    Route::get('/password/change/{id}', [\App\Http\Controllers\CustomerController::class, 'passwordChange']);

    Route::post('/password/update', [\App\Http\Controllers\CustomerController::class, 'passwordUpdate']);

    Route::post('/customer/logout', [\App\Http\Controllers\CustomerController::class, 'customerLogout']);

});

Route::get('/customer/signin', [\App\Http\Controllers\CustomerController::class, 'customerSignin']);
 

Route::post('/new/customer/signin', [\App\Http\Controllers\CustomerController::class, 'customerSigninForm']);

Route::get('/customer/create', [\App\Http\Controllers\CustomerController::class, 'customerCreate']);

Route::post('/new/customer/create', [\App\Http\Controllers\CustomerController::class, 'customerCreateForm']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/food/allfoods', [\App\Http\Controllers\FrontEndController::class, 'allfoods']);
Route::get('/food/allseats', [\App\Http\Controllers\FrontEndController::class, 'allseats']);


Route::post('/search/result', [\App\Http\Controllers\FrontEndController::class, 'searchResult']);
