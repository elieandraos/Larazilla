<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Models\PostType;
use App\Models\PostTypePanel;
use App\Models\PostTypePanelComponent;
use App\Models\Post;
use App\Models\Category;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);

        $router->model('postTypeSlug', 'App\Models\PostType', function($value){
            return PostType::where('slug', $value)->first();
        });

        $router->model('postId', 'App\Models\Post', function($value){
            return Post::findOrFail($value);
        });

        $router->model('postSlug', 'App\Models\Post', function($value){
            return Post::where('slug', $value)->first();
        });

        $router->model('categoryId', 'App\Models\Category', function($value){
            return Category::findOrFail($value);
        });

        $router->model('categorySlug', 'App\Models\Category', function($value){
            return  Category::where('slug', $value)->first();
        });

        $router->model('panelId', 'App\Models\PostTypePanel', function($value){
             return PostTypePanel::findOrFail($value);
        });
 
        $router->model('componentId', 'App\Models\PostTypePanelComponent', function($value){
             return PostTypePanelComponent::findOrFail($value);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
