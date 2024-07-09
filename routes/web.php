<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ecommerce
use App\Http\Controllers\Ecommerce\EcommerceItemsController;
use App\Http\Controllers\Ecommerce\EcommercePreOrderController;
use App\Http\Controllers\Ecommerce\EcommerceLeadController;
use App\Http\Controllers\Ecommerce\EcommerceSellerController;
use App\Http\Controllers\Ecommerce\EcommerceSiteController;
use App\Http\Controllers\Ecommerce\EcommerceCategoryController;
use App\Http\Controllers\Ecommerce\EcommerceAudioController;

// Blog
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\BlogCategoryController;
use App\Http\Controllers\Blog\BlogTagController;

use App\Http\Controllers\Global\SliderController;
use App\Http\Controllers\Global\PageController;
use App\Http\Controllers\Global\AboutController;
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
Route::get('/', [PageController::class, 'homepage'])->name('front.home');

// Privacy Policy
Route::get('privacy-policy', [PageController::class, 'privacy'])->name('privacy-policy');

// Terms of Service
Route::get('terms-of-service', [PageController::class, 'terms'])->name('terms-of-service');

// 404
Route::get('404', [PageController::class, 'error404'])->name('404');

// Sitemap
Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

/*
|--------------------------------------------------------------------------
| Frontend -> Global -> Blog
|--------------------------------------------------------------------------
*/

Route::get('blog/more-blogs', [PageController::class, 'blogs'])->name('blog.more');
Route::get('blog/detail/{slug}', [PageController::class, 'detail'])->name('blog.detail');

/*
|--------------------------------------------------------------------------
| Frontend -> Global -> Subscriber
|--------------------------------------------------------------------------
*/

Route::post('subscriber/new', [SubscriberController::class, 'subscriber'])->name('subscriber.new.front');

/*
|--------------------------------------------------------------------------
| Frontend -> Global -> About
|--------------------------------------------------------------------------
*/

Route::get('/about/overview', [PageController::class, 'overview'])->name('about.overview');
Route::get('/about/brand', [PageController::class, 'brand'])->name('about.brand');
Route::get('/about/license', [PageController::class, 'license'])->name('about.license');

/*
|--------------------------------------------------------------------------
| Frontend -> Global -> Contact
|--------------------------------------------------------------------------
*/

Route::get('contact-us', [ContactController::class, 'index'])->name('contact-us');
Route::post('contact-us/new', [ContactController::class, 'newContact'])->name('contact-us.new');

/*
|--------------------------------------------------------------------------
| Frontend -> Ecommerce
|--------------------------------------------------------------------------
*/

// Ecommerce
// Route::match(['head', 'get'], '/', [EcommerceItemsController::class, 'index'])->name('ecommerce.home');
Route::get('shop', [EcommerceItemsController::class, 'index'])->name('item.shop');
Route::get('item/detail/{slug}', [EcommerceItemsController::class, 'detail'])->name('item.detail');

// Ecommerce -> Category
Route::get('item/{category:slug}', [EcommerceItemsController::class, 'showByCategory'])->name('category.show');
Route::get('item/{category:slug}/{subcategory:slug}', [EcommerceItemsController::class, 'showBySubcategory'])->name('subcategory.show');
Route::get('item/{category:slug}/{subcategory:slug}/{subSubcategory:slug}', [EcommerceItemsController::class, 'showBySubSubcategory'])->name('subSubcategory.show');

// Ecommerce Pre Order
Route::get('ecommerce/pre-order/new', [EcommercePreOrderController::class, 'create'])->name('ecommerce.pre-order.new');
Route::post('ecommerce/pre-order/confirm', [EcommercePreOrderController::class, 'confirm'])->name('ecommerce.pre-order.confirm');
Route::get('ecommerce/pre-order/{uuid}', [EcommercePreOrderController::class, 'viewInvoice'])->name('ecommerce.pre-order.invoice.id');

// Ecommerce -> Subscriber
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

// Slider
Route::get('manage-sliders', [SliderController::class, 'show'])->middleware(['auth', 'verified'])->name('manage.sliders');
Route::get('manage-slider/slider/new', [SliderController::class, 'create'])->middleware(['auth', 'verified'])->name('slider.new');
Route::post('manage-slider/slider/store', [SliderController::class, 'store'])->middleware(['auth', 'verified'])->name('slider.store');
Route::get('manage-slider/edit/{id}', [SliderController::class, 'edit'])->middleware(['auth', 'verified'])->name('slider.edit');
Route::put('manage-slider/update/{id}', [SliderController::class, 'update'])->middleware(['auth', 'verified'])->name('slider.update');
Route::delete('manage-slider/destroy/{id}', [SliderController::class, 'destroy'])->middleware(['auth', 'verified'])->name('slider.destroy');

// Pages
Route::get('manage-pages', [PageController::class, 'show'])->middleware(['auth', 'verified'])->name('page.manage-pages');
Route::get('manage-pages/page/new', [PageController::class, 'create'])->middleware(['auth', 'verified'])->name('page.new');
Route::post('manage-pages/page/store', [PageController::class, 'store'])->middleware(['auth', 'verified'])->name('page.store');
Route::get('manage-pages/page/edit/{id}', [PageController::class, 'edit'])->middleware(['auth', 'verified'])->name('page.edit');
Route::put('manage-pages/page/update/{id}', [PageController::class, 'update'])->middleware(['auth', 'verified'])->name('page.update');
Route::delete('manage-pages/page/destroy/{id}', [PageController::class, 'destroy'])->middleware(['auth', 'verified'])->name('page.destroy');

// Contact
Route::get('manage-contacts', [ContactController::class, 'show'])->middleware(['auth', 'verified'])->name('manage.contacts');
Route::get('manage-contact/contact/new', [ContactController::class, 'create'])->middleware(['auth', 'verified'])->name('contact.new');
Route::post('manage-contact/contact/store', [ContactController::class, 'store'])->middleware(['auth', 'verified'])->name('contact.store');
Route::get('manage-contact/edit/{id}', [ContactController::class, 'edit'])->middleware(['auth', 'verified'])->name('contact.edit');
Route::get('manage-contact/view/{id}', [ContactController::class, 'view'])->middleware(['auth', 'verified'])->name('contact.view');
Route::put('manage-contact/update/{id}', [ContactController::class, 'update'])->middleware(['auth', 'verified'])->name('contact.update');
Route::delete('manage-contact/destroy/{id}', [ContactController::class, 'destroy'])->middleware(['auth', 'verified'])->name('contact.destroy');

// Subscriber
Route::get('manage-subscribers', [SubscriberController::class, 'show'])->middleware(['auth', 'verified'])->name('manage.subscribers');
Route::get('manage-subscriber/subscriber/new', [SubscriberController::class, 'create'])->middleware(['auth', 'verified'])->name('subscriber.new');
Route::post('manage-subscriber/subscriber/store', [SubscriberController::class, 'store'])->middleware(['auth', 'verified'])->name('subscriber.store');
Route::get('manage-subscriber/subscriber/edit/{id}', [SubscriberController::class, 'edit'])->middleware(['auth', 'verified'])->name('subscriber.edit');
Route::put('manage-subscriber/subscriber/update/{id}', [SubscriberController::class, 'update'])->middleware(['auth', 'verified'])->name('subscriber.update');
Route::delete('manage-subscriber/subscriber/destroy/{id}', [SubscriberController::class, 'destroy'])->middleware(['auth', 'verified'])->name('subscriber.destroy');

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

// Ecommerce Item
Route::get('ecommerce/manage-items', [EcommerceItemsController::class, 'show'])->middleware(['auth', 'verified'])->name('ecommerce.manage-item');
Route::get('ecommerce/item/new', [EcommerceItemsController::class, 'create'])->middleware(['auth', 'verified'])->name('ecommerce.item.new');
Route::post('ecommerce/item/store', [EcommerceItemsController::class, 'store'])->middleware(['auth', 'verified'])->name('ecommerce.item.store');
Route::get('ecommerce/item/edit/{id}', [EcommerceItemsController::class, 'edit'])->middleware(['auth', 'verified'])->name('ecommerce.item.edit');
Route::put('ecommerce/item/update/{id}', [EcommerceItemsController::class, 'update'])->middleware(['auth', 'verified'])->name('ecommerce.item.update');
Route::delete('ecommerce/item/destroy/{id}', [EcommerceItemsController::class, 'destroy'])->middleware(['auth', 'verified'])->name('ecommerce.item.destroy');

// Ecommerce Pre Order > Back
Route::get('ecommerce/manage-pre-order', [EcommercePreOrderController::class, 'show'])->middleware(['auth', 'verified'])->name('ecommerce.pre-order.manage');
Route::post('ecommerce/pre-order/store', [EcommercePreOrderController::class, 'store'])->middleware(['auth', 'verified'])->name('ecommerce.pre-order.store');
Route::get('ecommerce/pre-order/edit/{id}', [EcommercePreOrderController::class, 'edit'])->middleware(['auth', 'verified'])->name('ecommerce.pre-order.edit');
Route::get('ecommerce/pre-order/view/{id}', [EcommercePreOrderController::class, 'view'])->middleware(['auth', 'verified'])->name('ecommerce.pre-order.view');
Route::put('ecommerce/pre-order/update/{id}', [EcommercePreOrderController::class, 'update'])->middleware(['auth', 'verified'])->name('ecommerce.pre-order.update');
Route::delete('ecommerce/pre-order/destroy/{id}', [EcommercePreOrderController::class, 'destroy'])->middleware(['auth', 'verified'])->name('ecommerce.pre-order.destroy');

// Ecommerce Lead > Front
Route::get('ecommerce/lead/new', [EcommerceLeadController::class, 'create'])->name('ecommerce.lead.new');
Route::post('ecommerce/confirm-pre-order', [EcommerceLeadController::class, 'storeFront'])->name('ecommerce.lead.store.front');
Route::get('ecommerce/new-pre-order/invoice', [EcommerceLeadController::class, 'invoice'])->name('ecommerce.lead.store.front.invoice');
// Ecommerce Lead > Back
Route::get('ecommerce/manage-lead', [EcommerceLeadController::class, 'show'])->middleware(['auth', 'verified'])->name('ecommerce.manage-lead');
Route::post('ecommerce/lead/store', [EcommerceLeadController::class, 'storeBack'])->middleware(['auth', 'verified'])->name('ecommerce.lead.store');
Route::get('ecommerce/lead/edit/{id}', [EcommerceLeadController::class, 'edit'])->middleware(['auth', 'verified'])->name('ecommerce.lead.edit');
Route::get('ecommerce/lead/view/{id}', [EcommerceLeadController::class, 'view'])->middleware(['auth', 'verified'])->name('ecommerce.lead.view');
Route::put('ecommerce/lead/update/{id}', [EcommerceLeadController::class, 'update'])->middleware(['auth', 'verified'])->name('ecommerce.lead.update');
Route::delete('ecommerce/lead/destroy/{id}', [EcommerceLeadController::class, 'destroy'])->middleware(['auth', 'verified'])->name('ecommerce.lead.destroy');

require __DIR__.'/auth.php';
