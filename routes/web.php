<?php


use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\InvoiceController;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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
});
//USER
Route::group([
    'prefix' => 'admin', //tiền tố đường dẫn
    'as' => 'admin.', //name
], function () {
    //UER
    Route::group([
        'prefix' => 'users', //tiền tố đường dẫn
        'as' => 'users.', //name
    ], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create-user');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::get('/{id}', [UserController::class, 'show'])->name('show');
        Route::post('/delete/{id}', [UserController::class, 'delete'])->name('delete');
    });

    //CATEGORY
    Route::group([
        'prefix' => 'categories', //tiền tố đường dẫn
        'as' => 'categories.', //name
    ], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/{id}', [CategoryController::class, 'show'])->name('show');
        Route::post('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });

    //PRODUCT
    Route::group([
        'prefix' => 'products', //tiền tố đường dẫn
        'as' => 'products.', //name
    ], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('/{id}', [ProductController::class, 'show'])->name('show');
        Route::post('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
        Route::get('/activePro/{pro_id}', [ProductController::class, 'activePro'])->name('activePro');
        Route::get('/unactivePro/{pro_id}', [ProductController::class, 'unactivePro'])->name('unactivePro');
    });

    //HÓA ĐƠN
    Route::group([
        'prefix' => 'invoices', //tiền tố đường dẫn
        'as' => 'invoices.', //name
    ], function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('index');
        Route::get('/{id}', [InvoiceController::class, 'show'])->name('show');
        Route::post('/delete/{id}', [InvoiceController::class, 'delete'])->name('delete');
    });
});
