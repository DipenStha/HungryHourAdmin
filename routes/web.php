<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name("home");
Route::get('/home', function () {
    return view('welcome');
})->name("home");

Auth::routes();
Route::group(['middleware' => ['auth',"isAdmin"]], function () { 

    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin_home'])->name('admin_home')->middleware('isAdmin');
    // Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin_home'])->name('admin_home1')->middleware('isRestaurantAdmin');
    Route::get('/restaurants', [App\Http\Controllers\RestaurantController::class, 'show_restaurants'])->name('show_restaurants');
    Route::post('/restaurant/create', [App\Http\Controllers\RestaurantController::class, 'create'])->name('restaurant.create');
    // Route::get('/users', [App\Http\Controllers\UserController::class, 'show_users'])->name('show_users');
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'show_categories'])->name('show_categories');
    Route::get('/areas', [App\Http\Controllers\AreaController::class, 'show_areas'])->name('show_areas');
    
    Route::post('/food/create', [App\Http\Controllers\FoodController::class, 'create'])->name('food.create');
    Route::get('/foods', [App\Http\Controllers\FoodController::class, 'show_foods'])->name('show_foods');
    Route::get('/food/add', [App\Http\Controllers\FoodController::class, 'add_foods'])->name('add_foods');
    Route::get('/food/edit/{id}', [App\Http\Controllers\FoodController::class, 'edit_foods'])->name('food.edit_foods');
    Route::post('/food/update/{id}', [App\Http\Controllers\FoodController::class, 'update_foods'])->name('food.update_foods');
    
    Route::post('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'show_categories'])->name('show_categories');
    Route::get('/category/add', [App\Http\Controllers\CategoryController::class, 'add_categories'])->name('add_categories');
    Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit_categories'])->name('category.edit_categories');
    Route::post('/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update_categories'])->name('category.update_categories');
    
    Route::post('/area/create', [App\Http\Controllers\AreaController::class, 'create'])->name('area.create');
    Route::get('/areas', [App\Http\Controllers\AreaController::class, 'show_areas'])->name('show_areas');
    Route::get('/area/add', [App\Http\Controllers\AreaController::class, 'add_areas'])->name('add_areas');
    Route::get('/area/edit/{id}', [App\Http\Controllers\AreaController::class, 'edit_areas'])->name('area.edit_areas');
    Route::post('/area/update/{id}', [App\Http\Controllers\AreaController::class, 'update_areas'])->name('area.update_areas');
    
    Route::post('/delivery_address/create', [App\Http\Controllers\DeliveryAddressController::class, 'create'])->name('delivery_address.create');
    Route::get('/delivery_addresses', [App\Http\Controllers\DeliveryAddressController::class, 'show_delivery_addresses'])->name('show_delivery_addresses');
    Route::get('/delivery_address/add', [App\Http\Controllers\DeliveryAddressController::class, 'add_delivery_addresses'])->name('add_delivery_addresses');
    Route::get('/delivery_address/edit/{id}', [App\Http\Controllers\DeliveryAddressController::class, 'edit_delivery_addresses'])->name('delivery_address.edit_delivery_addresses');
    Route::post('/delivery_address/update/{id}', [App\Http\Controllers\DeliveryAddressController::class, 'update_delivery_addresses'])->name('delivery_address.update_delivery_addresses');
    
    Route::post('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'show_users'])->name('show_users');
    // Route::get('/users', [App\Http\Controllers\UserController::class, 'showUsers'])->name('showUsers');
    Route::get('/user/add', [App\Http\Controllers\UserController::class, 'add_users'])->name('add_users');
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit_users'])->name('user.edit_users');
    Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update_users'])->name('user.update_users');
    
    Route::post('/order/create', [App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'show_orders'])->name('show_orders');
    Route::get('/order/add', [App\Http\Controllers\OrderController::class, 'add_orders'])->name('add_orders');
    Route::get('/order/edit/{id}', [App\Http\Controllers\OrderController::class, 'edit_orders'])->name('order.edit_orders');
    Route::post('/order/update/{id}', [App\Http\Controllers\OrderController::class, 'update_order'])->name('order.update_orders');

    Route::get('/order_details/{id}', [App\Http\Controllers\OrderDetailsController::class, 'show_order_details'])->name('show_order_details');
    Route::get('/order_detail/add', [App\Http\Controllers\OrderDetailsController::class, 'add_order_details'])->name('add_order_details');
    Route::get('/order_detail/edit/{id}', [App\Http\Controllers\OrderDetailsController::class, 'edit_order_details'])->name('order_detail.edit_order_details');

    
    Route::get('/user/get_user_photo/{id}', [App\Http\Controllers\UserController::class, 'get_user_photo'])->name('user.get_user_photo');
    Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
    Route::get('/restaurant/delete/{id}', [App\Http\Controllers\RestaurantController::class, 'delete'])->name('restaurant.delete');
    Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/food/delete/{id}', [App\Http\Controllers\FoodController::class, 'delete'])->name('food.delete');
    Route::get('/area/delete/{id}', [App\Http\Controllers\AreaController::class, 'delete'])->name('area.delete');
    Route::get('/order/delete/{id}', [App\Http\Controllers\AreaController::class, 'delete'])->name('order.delete');
    Route::get('/delivery_address/delete/{id}', [App\Http\Controllers\DeliveryAddressController::class, 'delete'])->name('delivery_address.delete');
    Route::get('/restaurant/add', [App\Http\Controllers\RestaurantController::class, 'add_restaurants'])->name('add_restaurants');
    Route::get('/restaurant/edit/{id}', [App\Http\Controllers\RestaurantController::class, 'edit_restaurants'])->name('restaurant.edit_restaurants');
    Route::post('/restaurant/update/{id}', [App\Http\Controllers\RestaurantController::class, 'update_restaurants'])->name('restaurant.update_restaurants');
    
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

