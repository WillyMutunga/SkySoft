<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\PostController as AdminPostController;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/solutions', [PageController::class, 'solutions'])->name('solutions');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{slug}/datasheet', [ProductController::class, 'datasheet'])->name('products.datasheet');
Route::post('/products/{id}/quote', [ProductController::class, 'submitQuote'])->name('products.quote');

// Tech Insights & Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// SEO & Crawlers
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [PageController::class, 'robots'])->name('robots');

use App\Http\Controllers\Admin\UserController as AdminUserController;

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    /*
    | Protected Admin Routes
    */
    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Products CRUD (Protected by products.manage)
        Route::middleware('permission:products.manage')->group(function () {
            Route::resource('products', AdminProductController::class);
        });

        // Posts & Tech Insights CRUD (Protected by posts.manage)
        Route::middleware('permission:posts.manage')->group(function () {
            Route::resource('posts', AdminPostController::class);
        });

        // Inquiries Management (Protected by inquiries.manage)
        Route::middleware('permission:inquiries.manage')->group(function () {
            Route::get('/inquiries/export/csv', [AdminInquiryController::class, 'exportCsv'])->name('inquiries.export');
            Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
            Route::get('/inquiries/{id}', [AdminInquiryController::class, 'show'])->name('inquiries.show');
            Route::patch('/inquiries/{id}/status', [AdminInquiryController::class, 'updateStatus'])->name('inquiries.updateStatus');
            Route::delete('/inquiries/{id}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');
        });

        // Company Settings (Protected by settings.manage)
        Route::middleware('permission:settings.manage')->group(function () {
            Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
            Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
        });

        // User Management & Privileges (Protected by users.manage)
        Route::middleware('permission:users.manage')->group(function () {
            Route::resource('users', AdminUserController::class);
        });
    });
});
