<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\MiniTestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\PurchaseController;

Route::view('/', 'welcome');


Route::view('/multable', 'multable');
Route::view('/even', 'even');
Route::view('/prime', 'prime');
Route::view('/calculator', 'calculator')->name('calculator');


Route::get('/minitest', [PageController::class, 'miniTest'])->name('minitest');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/minitest/show', [MiniTestController::class, 'show']);


Auth::routes(['verify' => true]);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/user/profile', 'user.profile')->name('user.profile');

    Route::get('/profiles/create', [StudentProfileController::class, 'create'])->name('student_profiles.create');
    Route::post('/profiles', [StudentProfileController::class, 'store'])->name('student_profiles.store');
    Route::get('/profiles', [StudentProfileController::class, 'index'])->name('student_profiles.index');
});


// Route::middleware(['web', 'auth', 'is_admin'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::resource('/products', AdminProductController::class);
// });


Route::get('/make-admin', function () {
    $user = \App\Models\User::find(1); 
    $user->is_admin = true;
    $user->save();
    return "User is now admin!";
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/minitest', [PageController::class, 'miniTest']);
Auth::routes(); 


Route::middleware(['auth'])->group(function () {
    Route::get('/minitest', [PageController::class, 'miniTest']);
    Route::post('/buy', [PageController::class, 'buy'])->name('buy')->middleware('auth');

});
Route::post('/buy', [PurchaseController::class, 'buy'])->name('buy')->middleware('auth');
Route::post('/add-balance', [App\Http\Controllers\UserController::class, 'addBalance'])->name('add.balance');


Route::post('/add-balance', [UserController::class, 'addBalance'])->name('add.balance');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});

Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'index']);
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/shop', [ShopController::class, 'index']);
});

Route::middleware(['auth', 'role:admin,employee'])->group(function () {
    Route::get('/staff-area', [StaffController::class, 'index']);
});
Route::middleware(['auth', 'role:employee'])->prefix('employee')->group(function () {
    Route::resource('/products', EmployeeProductController::class);
});