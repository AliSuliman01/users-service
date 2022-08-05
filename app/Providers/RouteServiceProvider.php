<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    private const RouteFiles = [
        'routes/api.php',
        'routes/Categories/Categories/categories.php',
        'routes/Categories/CategoryToCategory/category_to_category.php',
        'routes/Categories/CategoryImages/category_images.php',
        'routes/Categories/CategoryTranslation/category_translation.php',
        'routes/Languages/languages.php',
        'routes/Server/server.php',
        'routes/Users/Users/users.php',
        'routes/Users/Roles/roles.php',
        "routes/Users/Activities/ActivityTypes/ActivityTypes/activity_types.php",
        "routes/Users/Activities/Browsers/Browsers/browsers.php",
        "routes/Users/Activities/Platforms/Platforms/platforms.php",
    ];
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $this->configureRateLimiting();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    public function map()
    {

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

        Route::group(['prefix' => 'api'], function () {
            Route::group(['prefix' => 'v1'], function () {
                foreach (self::RouteFiles as $routeFile)
                    Route::middleware('api')
                        ->namespace($this->namespace)
                        ->group(base_path($routeFile));
            });
        });
    }
}
