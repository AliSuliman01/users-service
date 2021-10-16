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
    public function map(){
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapGlobalRoutes('global');
        $this->mapMaterialRoutes();
    }

    private function mapApiRoutes(){
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
    private function mapWebRoutes(){

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
    private function mapGlobalRoutes($prefix=''){

        Route::middleware('api')
            ->namespace($this->namespace)
            ->prefix($prefix)
            ->group(base_path('routes/Global/Languages/languages.php'));
        $this->mapCategoriesRoutes($prefix);
    }

    private function mapCategoriesRoutes($prefix=''){
        Route::middleware('api')
            ->namespace($this->namespace)
            ->prefix($prefix)
            ->group(base_path('routes/Global/Categories/Categories/categories.php'));
        Route::middleware('api')
            ->namespace($this->namespace)
            ->prefix($prefix)
            ->group(base_path('routes/Global/Categories/CategoryToCategory/category_to_category.php'));
        Route::middleware('api')
            ->namespace($this->namespace)
            ->prefix($prefix)
            ->group(base_path('routes/Global/Categories/CategoryImages/category_images.php'));
        Route::middleware('api')
            ->namespace($this->namespace)
            ->prefix($prefix)
            ->group(base_path('routes/Global/Categories/CategoryTranslation/category_translation.php'));
    }
    private function mapMaterialRoutes($prefix=''){

    }
}
