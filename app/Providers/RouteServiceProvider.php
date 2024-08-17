<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const EcommercePreOrder = 'ecommerce/manage-pre-order';

    public const HOME = '/dashboard';

    public const EcommerceHome = '/';
    public const EcommerceCategories = '/ecommerce/categories/manage-categories';
    public const EcommerceSubCategories = '/ecommerce/categories/manage-subcategories';
    public const EcommerceSubSubCategories = '/ecommerce/categories/manage-sub-subcategories';
    public const EcommerceItem = '/ecommerce/manage-items';
    public const EcommerceSeller = 'ecommerce/seller/manage-seller';
    public const EcommerceLead = 'ecommerce/manage-lead';

    public const ManageSliders = 'manage-sliders';
    public const ManagePages = 'manage-pages';

    public const Blog = 'blog/manage';
    public const BlogCategories = 'blog/categories';

    public const ManageContacts = 'manage-contacts';
    public const ManageSubscribers = 'manage-subscribers';
    public const ManageSettings = 'settings';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
