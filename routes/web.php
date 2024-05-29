<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ManagerRole;

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

Route::get('/', [MainController::class,'MainView'])->name('/');
Route::view('/registration', 'users.registration')->name('register');
Route::view('/delivery','delivery')->name('delivery');
Route::post('/registration', [UserController::class, 'register']);
Route::view('/authorization', 'users.authorization')->name('auth');
Route::post('/authorization', [UserController::class, 'authorization']);
Route::get('/main', [MainController::class, 'MainView'])->name('main');
Route::view('/booking','booking')->name('booking');
Route::post('/booking',[BookingController::class,'AddBookingPost'])->name('booking.create');
Route::view('/contacts','contacts')->name('contacts');
Route::get('/catalog', [CatalogController::class, 'CatalogView'])->name('catalog');
Route::get('catalog/product/{product}', [CatalogController::class, 'CatalogProductView'])->name('catalog_product');
Route::middleware('auth')->group(function (){
    Route::get('/logout', [UserController::class , 'logout'])->name('logout');
    Route::get('/basket', [BasketController::class , 'BasketView'])->name('basket');
    Route::post('/basket/add{product}', [BasketController::class, 'itemAdd'])->name('basket.add');
    Route::post('/basket/remove{product}', [BasketController::class, 'itemRemove'])->name('basket.remove');
    Route::post('/orders/create',[OrdersController::class, 'orderCreate'])->name('order.create');
    Route::get('/orders',[OrdersController::class, 'orderView'])->name('orders');
    Route::post('/orders/remove{order}',[OrdersController::class, 'orderRemove'])->name('order.remove');

    Route::middleware(ManagerRole::class)->group(function (){
        Route::view('manager/', 'managers.manager')->name('manager');
        Route::get('manager/orders', [ManagerController::class,'ManagerOrderView'])->name('manager.order');
        Route::post('manager/orders/sort', [ManagerController::class,'ManagerOrderView'])->name('manager.order.sort');
        Route::post('manager/orders/{orderId}/status/{action}', [ManagerController::class,'changeStatusOrder'])->name('manager.order.status');
        Route::get('manager/bookings', [BookingController::class, 'BookingView'])->name('manager.booking');
        Route::post('manager/delBooking{booking}', [BookingController::class, 'DeleteBookingPost'])->name('deleteBooking');
        Route::get('/orders',[OrdersController::class, 'orderView'])->name('orders');
    });
    Route::middleware('role')->group(function (){
        Route::view('admin/', 'admins.admin')->name('admin');
        Route::get('admin/category', [CategoryController::class, 'CategoryView'])->name('category');
        Route::get('admin/products', [ProductController::class, 'ProductView'])->name('product');
        Route::post('admin/category', [CategoryController::class, 'CategoryAdd']);
        Route::post('admin/deleteCategory{category}', [CategoryController::class, 'CategoryDelete'])->name('deleteCategory');
        Route::post('admin/editCategory{category}', [CategoryController::class, 'CategoryEdit'])->name('editCategory');
        Route::post('admin/products', [ProductController::class, 'AddProductPost'])->name('add_product');
        Route::post('admin/delProduct{product}', [ProductController::class, 'DeleteProductPost'])->name('deleteProduct');
        Route::post('admin/editProduct{product}', [ProductController::class, 'EditProductPost'])->name('editProduct');

        Route::get('admin/orders', [AdminController::class, 'adminOrderView'])->name('admin.order');
        Route::post('admin/orders/sort', [AdminController::class, 'adminOrderView'])->name('admin.order.sort');
        Route::post('admin/orders/{orderId}/status/{action}', [AdminController::class, 'changeStatusOrder'])->name('admin.order.status');
    });
});

