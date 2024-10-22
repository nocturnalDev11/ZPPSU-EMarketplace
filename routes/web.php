<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\MessagesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\Lists\PostController;
use App\Http\Controllers\User\Lists\TradeController;
use App\Http\Controllers\User\Lists\SearchController;
use App\Http\Controllers\User\Lists\ProductController;
use App\Http\Controllers\User\Lists\ServiceController;
use App\Http\Controllers\Admin\Lists\PostControllerManagement;
use App\Http\Controllers\Admin\Users\UserManagementController;
use App\Http\Controllers\Admin\Lists\TradeControllerManagement;
use App\Http\Controllers\Admin\Lists\ProductControllerManagement;
use App\Http\Controllers\Admin\Lists\ServiceControllerManagement;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Guest routes
|--------------------------------------------------------------------------
*/

Route::post('/send-credentials', [UserController::class, 'sendCredentials'])->name('send.credentials');

Route::prefix('user')->group(function () {
    Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('login', [UserController::class, 'login']);
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Authenticated user routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/profile/{id?}', [ProfileController::class, 'show'])->name('users.profile');
        Route::get('/home', [HomeController::class, 'index'])->name('users.home');
    });
    Route::prefix('profile')->group(function () {
        Route::get('/', [UserController::class, 'userMenu']);
        Route::get('/{id}', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/{id}/activities', [ProfileController::class, 'activities'])->name('profile.activities');
        Route::get('/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/profile/update-picture', [ProfileController::class, 'updateProfilePicture'])->name('profile.update.picture');
        Route::put('/{id}/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    });
    Route::prefix('messages')->group(function () {
        Route::get('/', [MessagesController::class, 'index'])->name('messages.index');
        Route::post('/reply/{user}', [MessagesController::class, 'reply'])->name('messages.reply');
        Route::get('/{user}', [MessagesController::class, 'conversation'])->name('messages.conversation');
        Route::post('/store', [MessagesController::class, 'store'])->name('messages.store');
        Route::delete('/{message}', [MessagesController::class, 'destroy'])->name('messages.destroy');
        Route::post('/messages/createPlan', [MessagesController::class, 'createPlan'])->name('messages.createPlan');
    });
    Route::get('/search', [SearchController::class, 'search'])->name('search');

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
    | TRADING routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('trades')->group(function () {
        Route::get('/details/{id}', [TradeController::class, 'show'])->name('trades.details');
        Route::get('/', [TradeController::class, 'index'])->name('lists.trades.index');
        Route::post('/store', [TradeController::class, 'store'])->name('trades.store');
        Route::get('/{trade}', [TradeController::class, 'show'])->name('trades.show');
        Route::get('/{trade}/edit', [TradeController::class, 'edit'])->name('trades.edit');
        Route::put('/{trade}', [TradeController::class, 'update'])->name('trades.update');
        Route::delete('/{trade}', [TradeController::class, 'destroy'])->name('trades.destroy');
    });
});

/*
|--------------------------------------------------------------------------
| ADMIN routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::middleware('guest.admin')->name('admin.')->group(function () {
        Route::get('login', [AdminController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminController::class, 'login']);
    });

    /*
    |--------------------------------------------------------------------------
    | Authenticated admin routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

        /*
        |--------------------------------------------------------------------------
        | User CRUD routes
        |--------------------------------------------------------------------------
        */
        Route::post('user/create', [UserManagementController::class, 'store'])->name('create.user');
        Route::get('user/view/{id}', [UserManagementController::class, 'show'])->name('view.user');
        Route::get('all/users', [UserManagementController::class, 'index'])->name('all.users');
        Route::get('{user}/edit', [UserManagementController::class, 'edit'])->name('edit.user');
        Route::put('/user/{user}', [UserManagementController::class, 'update'])->name('update.user');
        Route::delete('user/{user}', [UserManagementController::class, 'destroy'])->name('delete.user');

        Route::prefix('products')->group(function () {
            Route::get('/', [ProductControllerManagement::class, 'index'])->name('products');
            Route::delete('/{product}', [ProductControllerManagement::class, 'destroy'])->name('delete.products');
        });

        Route::prefix('services')->group(function () {
            Route::get('/', [ServiceControllerManagement::class, 'index'])->name('services');
            Route::delete('/{service}', [ServiceControllerManagement::class, 'destroy'])->name('delete.services');
        });

        Route::prefix('posts')->group(function () {
            Route::get('/', [PostControllerManagement::class, 'index'])->name('posts');
            Route::delete('/{post}', [PostControllerManagement::class, 'destroy'])->name('delete.posts');
        });

        Route::prefix('trades')->group(function () {
            Route::get('/', [TradeControllerManagement::class, 'index'])->name('trades');
            Route::delete('/{trade}', [TradeControllerManagement::class, 'destroy'])->name('delete.trades');
        });
    });
});
