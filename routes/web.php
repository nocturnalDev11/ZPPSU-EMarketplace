<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\NavController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Lists\PostController;
use App\Http\Controllers\Lists\TradeController;
use App\Http\Controllers\Lists\SearchController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Lists\ProductController;
use App\Http\Controllers\Lists\ServiceController;
use App\Http\Controllers\User\MessagesController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Users\AdminUserController;
use App\Http\Controllers\Admin\Users\ListOfUsersController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Layouts\NavController as AdminNavController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
/*
|------------------------------------------------------------------------------
| Authentication Routes
|------------------------------------------------------------------------------
*/
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::prefix('password')->group(function () {
    Route::get('/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset', [ResetPasswordController::class, 'reset']);
});
/*
|------------------------------------------------------------------------------
| Routes for authenticated users
|------------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function () {
    /*
    |--------------------------------------------------------------------------
    | Route to users' profile (both with and without ID)
    |--------------------------------------------------------------------------
    */
    Route::prefix('user')->group(function () {
        Route::get('/profile/{id?}', [ProfileController::class, 'show'])->name('user.profile');
        Route::get('/home', [HomeController::class, 'index'])->name('user.home');
        Route::get('/settings/{id?}', [SettingsController::class, 'show'])->name('user.settings');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [NavController::class, 'index'])->name('profile');
        Route::get('/{id}', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/{id}/activities', [ProfileController::class, 'activities'])->name('profile.activities');
        Route::get('/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/profile/update-picture', [ProfileController::class, 'updateProfilePicture'])->name('profile.update.picture');
    });

    /*
    |--------------------------------------------------------------------------
    | Route for searching user, products, services, posts and trades
    |--------------------------------------------------------------------------
    */
    Route::get('/search', [SearchController::class, 'search'])->name('search');

    /*
    |--------------------------------------------------------------------------
    | Route to message section
    |--------------------------------------------------------------------------
    */
    Route::prefix('messages')->group(function () {
        Route::get('/', [MessagesController::class, 'index'])->name('messages.index');
        Route::post('/reply/{user}', [MessagesController::class, 'reply'])->name('messages.reply');
        Route::get('/{user}', [MessagesController::class, 'conversation'])->name('messages.conversation');
        Route::post('/store', [MessagesController::class, 'store'])->name('messages.store');
        Route::delete('/{message}', [MessagesController::class, 'destroy'])->name('messages.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | POST routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('posts')->group(function () {
        Route::get('/view/{id}', [PostController::class, 'show'])->name('posts.view');
        Route::get('/', [PostController::class, 'index'])->name('lists.posts.index');
        Route::post('/store', [PostController::class, 'store'])->name('posts.store');
        Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | PRODUCT routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('lists.products.index');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | SERVICES routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('services')->group(function () {
        Route::get('/details/{id}', [ServiceController::class, 'show'])->name('services.details');
        Route::get('/', [ServiceController::class, 'index'])->name('lists.services.index');
        Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/{service}', [ServiceController::class, 'show'])->name('services.show');
        Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/{service}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | TRADE routes
    |--------------------------------------------------------------------------
    */
    Route::get('/trades/details/{id}', [TradeController::class, 'show'])->name('trades.details');
    Route::get('/trades', [TradeController::class, 'index'])->name('lists.trades.index');
    Route::post('/trades/store', [TradeController::class, 'store'])->name('trades.store');
    Route::get('/trades/{trade}', [TradeController::class, 'show'])->name('trades.show');
    Route::get('/trades/{trade}/edit', [TradeController::class, 'edit'])->name('trades.edit');
    Route::put('/trades/{trade}', [TradeController::class, 'update'])->name('trades.update');
    Route::delete('/trades/{trade}', [TradeController::class, 'destroy'])->name('trades.destroy');

});

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Auth Routes
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Admin Dashboard
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [AdminNavController::class, 'index'])->name('admin.nav');
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | User CRUD routes
        |--------------------------------------------------------------------------
        */
        Route::get('users/profile/{id}', [AdminUserController::class, 'show'])->name('users.profile.show');
        Route::get('/users', [ListOfUsersController::class, 'index'])->name('users.list');
        Route::get('/users/create', [ListOfUsersController::class, 'create'])->name('users.create');
        Route::post('/users', [ListOfUsersController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [ListOfUsersController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [ListOfUsersController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [ListOfUsersController::class, 'destroy'])->name('users.destroy');
    });
});
