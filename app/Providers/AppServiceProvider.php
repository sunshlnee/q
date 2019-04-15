<?php

namespace App\Providers;

use App\Models\Product\Size;
use App\Models\Product\Brand;
use App\Models\Product\Color;
use App\Models\Product\Fabric;
use App\Models\Product\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadFields();
        $this->registerFlusher(Category::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function registerFlusher($class)
    {
        $flush = function() use ($class) {
            Cache::tags($class)->flush();
        };

        $class::created($flush);
        $class::saved($flush);
        $class::updated($flush);
        $class::deleted($flush);
    }

    public function loadFields()
    {
        $this->loadBrands();
        $this->loadSizes();
        $this->loadFabric();
        $this->loadColors();        
        $this->loadSidebar();
    }

    public function loadBrands()
    {
        View::composer('layouts.fields.brands', function ($view) {
            $view->with('brands', Brand::pluck('title', 'id')->all());
        });
    }

    public function loadSizes()
    {
        View::composer('layouts.fields.sizes', function($view) {
            $view->with('sizes', Size::pluck('title', 'id')->all());
        });
    }

    public function loadFabric()
    {
        View::composer('layouts.fields.fabrics', function($view) {
            $view->with('fabrics', Fabric::pluck('title', 'id')->all());
        });
    }

    public function loadColors()
    {
        View::composer('layouts.fields.colors', function($view) {
            $view->with('colors', Color::pluck('title', 'id')->all());
        });
    }

    public function loadSidebar()
    {
        View::composer('layouts.partials.sidebar', function($view) {
            $view->with('categories', Category::whereIsRoot()->get());
            $view->with('delimiter', '');
        });
    }
}
