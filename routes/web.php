<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ecommerce
use App\Http\Controllers\Ecommerce\EcommerceItemsController;
use App\Http\Controllers\Ecommerce\EcommerceSellerController;
use App\Http\Controllers\Ecommerce\EcommerceSiteController;
use App\Http\Controllers\Ecommerce\EcommerceCategoryController;
use App\Http\Controllers\Ecommerce\EcommerceAudioController;

// Blog
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\BlogCategoryController;
use App\Http\Controllers\Blog\BlogTagController;

use App\Http\Controllers\Global\PageController;
use App\Http\Controllers\Global\ContactController;
use App\Http\Controllers\Global\SubscriberController;
use App\Http\Controllers\Global\SettingController;
use App\Http\Controllers\Global\SitemapController;


/*
|--------------------------------------------------------------------------
| Frontend -> Global
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('', [PageController::class, 'homepage'])->name('front.home');

// Template -> Contact Us
Route::get('contact-us', [ContactController::class, 'index'])->name('template.contact-us');
Route::post('contact-us/new-contact', [ContactController::class, 'newContact'])->name('template.front.new-contact');

// Template -> Subscriber
Route::post('new-subscriber', [TemplateSubscriptionController::class, 'subscriber'])->name('template.new-subscriber');

// Privacy Policy
Route::get('privacy-policy', [PageController::class, 'privacy'])->name('privacy-policy');

// Terms of Service
Route::get('terms-of-service', [PageController::class, 'terms'])->name('terms-of-service');

Route::get('license', [PageController::class, 'license'])->name('license');

// 404
Route::get('404', [PageController::class, 'error404'])->name('404');

// Sitemap
Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

/*
|--------------------------------------------------------------------------
| Frontend -> Blog
|--------------------------------------------------------------------------
*/

Route::get('more-blogs', [PageController::class, 'blogs'])->name('blog.more');
Route::get('detail/{slug}', [PageController::class, 'detail'])->name('blog.detail');

/*
|--------------------------------------------------------------------------
| Frontend -> Ecommerce
|--------------------------------------------------------------------------
*/

// Ecommerce
// Route::match(['head', 'get'], '/', [EcommerceItemsController::class, 'index'])->name('ecommerce.home');
Route::get('items', [EcommerceItemsController::class, 'index'])->name('item.store');
Route::get('item/detail/{slug}', [EcommerceItemsController::class, 'detail'])->name('item.detail');

// Ecommerce -> Category
Route::get('item/{category:slug}', [EcommerceItemsController::class, 'showByCategory'])->name('category.show');
Route::get('item/{category:slug}/{subcategory:slug}', [EcommerceItemsController::class, 'showBySubcategory'])->name('subcategory.show');
Route::get('item/{category:slug}/{subcategory:slug}/{subSubcategory:slug}', [EcommerceItemsController::class, 'showBySubSubcategory'])->name('subSubcategory.show');

// Ecommerce -> Subscription
Route::post('new-subscriber', [SubscriberController::class, 'subscriber'])->name('ecommerce.new-subscriber');

/*
|--------------------------------------------------------------------------
| Backend -> Global
|--------------------------------------------------------------------------
*/

// Dashboard
Route::get('dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Pages
Route::get('manage-pages', [PageController::class, 'show'])->middleware(['auth', 'verified'])->name('page.manage-pages');
Route::get('manage-pages/new-page', [PageController::class, 'create'])->middleware(['auth', 'verified'])->name('page.new-page');
Route::post('manage-pages/new-page/store', [PageController::class, 'store'])->middleware(['auth', 'verified'])->name('page.new-page.store');
Route::get('manage-pages/edit/{id}', [PageController::class, 'edit'])->middleware(['auth', 'verified'])->name('page.edit');
Route::put('manage-pages/update/{id}', [PageController::class, 'update'])->middleware(['auth', 'verified'])->name('page.update');
Route::delete('manage-pages/destroy/{id}', [PageController::class, 'destroy'])->middleware(['auth', 'verified'])->name('page.destroy');

// Contact
Route::get('manage-contact', [ContactController::class, 'show'])->middleware(['auth', 'verified'])->name('manage.contact');
Route::get('manage-contact/new-contact', [ContactController::class, 'create'])->middleware(['auth', 'verified'])->name('new-contact');
Route::post('manage-contact/new-contact/store', [ContactController::class, 'store'])->middleware(['auth', 'verified'])->name('new-contact.store');
Route::get('manage-contact/edit/{id}', [ContactController::class, 'edit'])->middleware(['auth', 'verified'])->name('contact.edit');
Route::get('manage-contact/view/{id}', [ContactController::class, 'view'])->middleware(['auth', 'verified'])->name('contact.view');
Route::put('manage-contact/update/{id}', [ContactController::class, 'update'])->middleware(['auth', 'verified'])->name('contact.update');
Route::delete('manage-contact/destroy/{id}', [ContactController::class, 'destroy'])->middleware(['auth', 'verified'])->name('contact.destroy');

// Subscriber
Route::get('manage-subscriber', [SubscriberController::class, 'show'])->middleware(['auth', 'verified'])->name('manage.subscriber');
Route::get('manage-subscriber/new-subscription', [SubscriberController::class, 'create'])->middleware(['auth', 'verified'])->name('new-subscription');
Route::post('manage-subscriber/store-subscription', [SubscriberController::class, 'store'])->middleware(['auth', 'verified'])->name('store-subscription');
Route::get('manage-subscriber/edit-subscription/{id}', [SubscriberController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit-subscription');
Route::put('manage-subscriber/update-subscription/{id}', [SubscriberController::class, 'update'])->middleware(['auth', 'verified'])->name('update-subscription');
Route::delete('manage-subscriber/destroy-subscription/{id}', [SubscriberController::class, 'destroy'])->middleware(['auth', 'verified'])->name('destroy-subscription');

// Settings
Route::middleware('auth')->group(function () {
    Route::post('settings/store', [SettingController::class, 'store'])->name('setting.store');
    Route::get('settings', [SettingController::class, 'edit'])->name('setting.edit');
    Route::put('settings', [SettingController::class, 'update'])->name('setting.update');
});

/*
|--------------------------------------------------------------------------
| Backend -> Blog
|--------------------------------------------------------------------------
*/

// Blog -> Manage Blog
Route::get('blog/manage-blog', [BlogController::class, 'show'])->middleware(['auth', 'verified'])->name('blog.manage-blog');
Route::get('blog/new-blog', [BlogController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.new-blog');
Route::post('blog/new-blog/store', [BlogController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.store');
Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->middleware(['auth', 'verified'])->name('blog.edit');
Route::put('blog/update/{id}', [BlogController::class, 'update'])->middleware(['auth', 'verified'])->name('blog.update');
Route::delete('blog/destroy/{id}', [BlogController::class, 'destroy'])->middleware(['auth', 'verified'])->name('blog.destroy');

// Blog -> Categories
Route::get('blog/categories', [BlogCategoryController::class, 'show'])->middleware(['auth', 'verified'])->name('blog.categories');
Route::get('blog/new-category', [BlogCategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.new-category');
Route::post('blog/new-category/store', [BlogCategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.new-category.store');
Route::get('blog/edit-category/{id}', [BlogCategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('blog.category.edit');
Route::put('blog/update-category/{id}', [BlogCategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('blog.category.update');
Route::delete('blog/destroy-category/{id}', [BlogCategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('blog.category.destroy');

Route::get('blog/subcategories', [BlogCategoryController::class, 'show'])->middleware(['auth', 'verified'])->name('blog.subcategories');
Route::get('blog/subcategories/new-subcategory', [BlogCategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.new-subcategory');
Route::post('blog/subcategories/new-subcategory/store', [BlogCategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.new-subcategory.store');
Route::get('blog/subcategories/subcategory/edit/{id}', [BlogCategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('blog.subcategory.edit');
Route::put('blog/subcategories/subcategory/update/{id}', [BlogCategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('blog.subcategory.update');
Route::delete('blog/subcategories/subcategory/destroy/{id}', [BlogCategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('blog.subcategory.destroy');

Route::get('blog/sub-subcategories', [BlogCategoryController::class, 'show'])->middleware(['auth', 'verified'])->name('blog.sub-subcategories');
Route::get('blog/sub-subcategories/new-subsubcategory', [BlogCategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.new-sub-subcategory');
Route::post('blog/sub-subcategories/new-subsubcategory/store', [BlogCategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.new-sub-subcategory.store');
Route::get('blog/sub-subcategories/sub-subcategory/edit/{id}', [BlogCategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('blog.sub-subcategory.edit');
Route::put('blog/sub-subcategories/sub-subcategory/update/{id}', [BlogCategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('blog.sub-subcategory.update');
Route::delete('blog/sub-subcategories/sub-subcategory/destroy/{id}', [BlogCategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('blog.sub-subcategory.destroy');

// Blog -> Tag
Route::get('blog/tag', [BlogTagController::class, 'show'])->middleware(['auth', 'verified'])->name('blog.tag');
Route::get('blog/new-tag', [BlogTagController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.new-tag');
Route::post('blog/new-tag/store', [BlogTagController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.new-tag.store');
Route::get('blog/edit-tag/{id}', [BlogTagController::class, 'edit'])->middleware(['auth', 'verified'])->name('blog.tag.edit');
Route::put('blog/update-tag/{id}', [BlogTagController::class, 'update'])->middleware(['auth', 'verified'])->name('blog.tag.update');
Route::delete('blog/destroy-tag/{id}', [BlogTagController::class, 'destroy'])->middleware(['auth', 'verified'])->name('blog.tag.destroy');

/*
|--------------------------------------------------------------------------
| Backend -> Ecommerce
|--------------------------------------------------------------------------
*/

// Categories
Route::get('ecommerce/categories/manage-categories', [EcommerceCategoryController::class, 'show'])->middleware(['auth', 'verified'])->name('ecommerce.manage-categories');
Route::get('ecommerce/categories/new-category', [EcommerceCategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('ecommerce.new-category');
Route::post('ecommerce/categories/new-category/store', [EcommerceCategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('ecommerce.new-category.store');
Route::get('ecommerce/categories/edit-category/{id}', [EcommerceCategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('ecommerce.category.edit');
Route::put('ecommerce/categories/update-category/{id}', [EcommerceCategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('ecommerce.category.update');
Route::delete('categories/destroy-category/{id}', [EcommerceCategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('ecommerce.category.destroy');

Route::get('ecommerce/categories/manage-subcategories', [EcommerceCategoryController::class, 'show'])->middleware(['auth', 'verified'])->name('ecommerce.manage-subcategories');
Route::get('ecommerce/categories/subcategories/new-subcategory', [EcommerceCategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('ecommerce.new-subcategory');
Route::post('ecommerce/categories/subcategories/new-subcategory/store', [EcommerceCategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('ecommerce.new-subcategory.store');
Route::get('ecommerce/categories/subcategories/subcategory/edit/{id}', [EcommerceCategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('ecommerce.subcategory.edit');
Route::put('ecommerce/categories/subcategories/subcategory/update/{id}', [EcommerceCategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('ecommerce.subcategory.update');
Route::delete('ecommerce/categories/subcategories/subcategory/destroy/{id}', [EcommerceCategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('ecommerce.subcategory.destroy');

Route::get('ecommerce/categories/manage-sub-subcategories', [EcommerceCategoryController::class, 'show'])->middleware(['auth', 'verified'])->name('ecommerce.manage-sub-subcategories');
Route::get('ecommerce/categories/sub-subcategories/new-subsubcategory', [EcommerceCategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('ecommerce.new-sub-subcategory');
Route::post('ecommerce/categories/sub-subcategories/new-subsubcategory/store', [EcommerceCategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('ecommerce.new-sub-subcategory.store');
Route::get('ecommerce/categories/sub-subcategories/sub-subcategory/edit/{id}', [EcommerceCategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('ecommerce.sub-subcategory.edit');
Route::put('ecommerce/categories/sub-subcategories/sub-subcategory/update/{id}', [EcommerceCategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('ecommerce.sub-subcategory.update');
Route::delete('ecommerce/categories/sub-subcategories/sub-subcategory/destroy/{id}', [EcommerceCategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('ecommerce.sub-subcategory.destroy');

// Seller
Route::get('ecommerce/seller/manage-seller', [EcommerceSellerController::class, 'show'])->middleware(['auth', 'verified'])->name('ecommerce.manage-seller');
Route::get('ecommerce/seller/manage-seller/new-seller', [EcommerceSellerController::class, 'create'])->middleware(['auth', 'verified'])->name('ecommerce.new-seller');
Route::post('ecommerce/seller/manage-seller/new-seller/store', [EcommerceSellerController::class, 'store'])->middleware(['auth', 'verified'])->name('ecommerce.new-seller.store');
Route::get('ecommerce/seller/manage-seller/edit/{id}', [EcommerceSellerController::class, 'edit'])->middleware(['auth', 'verified'])->name('ecommerce.seller.edit');
Route::put('ecommerce/seller/manage-seller/update/{id}', [EcommerceSellerController::class, 'update'])->middleware(['auth', 'verified'])->name('ecommerce.seller.update');
Route::delete('ecommerce/seller/manage-seller/destroy/{id}', [EcommerceSellerController::class, 'destroy'])->middleware(['auth', 'verified'])->name('ecommerce.seller.destroy');

// Ecommerce
Route::get('ecommerce/manage-item', [EcommerceItemsController::class, 'show'])->middleware(['auth', 'verified'])->name('ecommerce.manage-item');
Route::get('ecommerce/new-item', [EcommerceItemsController::class, 'create'])->middleware(['auth', 'verified'])->name('ecommerce.new-item');
Route::post('ecommerce/store-item', [EcommerceItemsController::class, 'store'])->middleware(['auth', 'verified'])->name('ecommerce.item.store');
Route::get('ecommerce/edit-item/{id}', [EcommerceItemsController::class, 'edit'])->middleware(['auth', 'verified'])->name('ecommerce.item.edit');
Route::put('ecommerce/update-item/{id}', [EcommerceItemsController::class, 'update'])->middleware(['auth', 'verified'])->name('ecommerce.item.update');
Route::delete('ecommerce/destroy-item/{id}', [EcommerceItemsController::class, 'destroy'])->middleware(['auth', 'verified'])->name('ecommerce.item.destroy');

require __DIR__.'/auth.php';
