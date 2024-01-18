<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Blog
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\BlogCategoryController;
use App\Http\Controllers\Blog\BlogTagController;

use App\Http\Controllers\Global\PageController;
use App\Http\Controllers\Global\SettingController;
use App\Http\Controllers\Global\SitemapController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Blog
Route::get('/', [PageController::class, 'homepage'])->name('blog.home');
Route::get('/more-blogs', [PageController::class, 'blogs'])->name('blog.more');
Route::get('/detail/{slug}', [PageController::class, 'detail'])->name('blog.detail');

// Privacy Policy
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('blog.privacy-policy');

// Terms of Service
Route::get('/terms-of-service', [PageController::class, 'terms'])->name('blog.terms-of-service');

Route::get('/license', [PageController::class, 'license'])->name('blog.license');

// 404
Route::get('/404', [PageController::class, 'error404'])->name('blog.404');

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('blog.sitemap');

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Blog -> Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Blog -> Manage Blog
Route::get('/blog/manage-blog', [BlogController::class, 'show'])->middleware(['auth', 'verified'])->name('blog.manage-blog');
Route::get('/blog/new-blog', [BlogController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.new-blog');
Route::post('/blog/new-blog/store', [BlogController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.store');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->middleware(['auth', 'verified'])->name('blog.edit');
Route::put('/blog/update/{id}', [BlogController::class, 'update'])->middleware(['auth', 'verified'])->name('blog.update');
Route::delete('/blog/destroy/{id}', [BlogController::class, 'destroy'])->middleware(['auth', 'verified'])->name('blog.destroy');

// Blog -> Categories
Route::get('/blog/categories', [BlogCategoryController::class, 'show'])->middleware(['auth', 'verified'])->name('blog.categories');
Route::get('/blog/new-category', [BlogCategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.new-category');
Route::post('/blog/new-category/store', [BlogCategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.new-category.store');
Route::get('/blog/edit-category/{id}', [BlogCategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('blog.category.edit');
Route::put('/blog/update-category/{id}', [BlogCategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('blog.category.update');
Route::delete('/blog/destroy-category/{id}', [BlogCategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('blog.category.destroy');

Route::get('/blog/subcategories', [BlogCategoryController::class, 'show'])->middleware(['auth', 'verified'])->name('blog.subcategories');
Route::get('/blog/subcategories/new-subcategory', [BlogCategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.new-subcategory');
Route::post('/blog/subcategories/new-subcategory/store', [BlogCategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.new-subcategory.store');
Route::get('/blog/subcategories/subcategory/edit/{id}', [BlogCategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('blog.subcategory.edit');
Route::put('/blog/subcategories/subcategory/update/{id}', [BlogCategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('blog.subcategory.update');
Route::delete('/blog/subcategories/subcategory/destroy/{id}', [BlogCategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('blog.subcategory.destroy');

Route::get('/blog/sub-subcategories', [BlogCategoryController::class, 'show'])->middleware(['auth', 'verified'])->name('blog.sub-subcategories');
Route::get('/blog/sub-subcategories/new-subsubcategory', [BlogCategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.new-sub-subcategory');
Route::post('/blog/sub-subcategories/new-subsubcategory/store', [BlogCategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.new-sub-subcategory.store');
Route::get('/blog/sub-subcategories/sub-subcategory/edit/{id}', [BlogCategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('blog.sub-subcategory.edit');
Route::put('/blog/sub-subcategories/sub-subcategory/update/{id}', [BlogCategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('blog.sub-subcategory.update');
Route::delete('/blog/sub-subcategories/sub-subcategory/destroy/{id}', [BlogCategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('blog.sub-subcategory.destroy');

// Blog -> Tag
Route::get('/blog/tag', [BlogTagController::class, 'show'])->middleware(['auth', 'verified'])->name('blog.tag');
Route::get('/blog/new-tag', [BlogTagController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.new-tag');
Route::post('/blog/new-tag/store', [BlogTagController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.new-tag.store');
Route::get('/blog/edit-tag/{id}', [BlogTagController::class, 'edit'])->middleware(['auth', 'verified'])->name('blog.tag.edit');
Route::put('/blog/update-tag/{id}', [BlogTagController::class, 'update'])->middleware(['auth', 'verified'])->name('blog.tag.update');
Route::delete('/blog/destroy-tag/{id}', [BlogTagController::class, 'destroy'])->middleware(['auth', 'verified'])->name('blog.tag.destroy');

// Pages
Route::get('blog/manage-pages', [PageController::class, 'show'])->middleware(['auth', 'verified'])->name('blog.page.manage-pages');
Route::get('blog/manage-pages/new-page', [PageController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.page.new-page');
Route::post('blog/manage-pages/new-page/store', [PageController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.page.new-page.store');
Route::get('blog/manage-pages/edit/{id}', [PageController::class, 'edit'])->middleware(['auth', 'verified'])->name('blog.page.edit');
Route::put('blog/manage-pages/update/{id}', [PageController::class, 'update'])->middleware(['auth', 'verified'])->name('blog.page.update');
Route::delete('blog/manage-pages/destroy/{id}', [PageController::class, 'destroy'])->middleware(['auth', 'verified'])->name('blog.page.destroy');

// Blog -> Settings
Route::middleware('auth')->group(function () {
    Route::post('/blog/settings/store', [SettingController::class, 'store'])->name('blog.setting.store');
    Route::get('/blog/settings', [SettingController::class, 'edit'])->name('blog.setting.edit');
    Route::put('/blog/settings', [SettingController::class, 'update'])->name('blog.setting.update');
});

require __DIR__.'/auth.php';
