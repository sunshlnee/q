<?php

namespace App\Http\Router;

use App\Models\Product\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Routing\UrlRoutable;

class ProductsPath implements UrlRoutable
{
    public $category;

    public function withCategory(Category $category)
    {
        $clone = clone $this;
        $clone->category = $category;
        return $clone;
    }

    public function getRouteKey()
    {
        return Cache::tags(Category::class)->rememberForever('category_path_' . $this->category->id, function () {
            return $this->category->getPath();
        });
    }

    public function getRouteKeyName()
    {
        return 'products_path';
    }

    public function resolveRouteBinding($value)
    {
        $chunks = explode('/', $value);
        $category = null;

        do {
            $slug = reset($chunks);
            if ($slug && $next = Category::where('slug', $slug)->where('parent_id', $category ? $category->id : null)->first()) {
                $category = $next;
                array_shift($chunks);
            }
        } while (!empty($slug) && !empty($next));

        if (!empty($chunks)) {
            abort(404);
        }

        return $this->withCategory($category);
    }
}
