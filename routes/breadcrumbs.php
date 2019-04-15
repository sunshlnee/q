<?php 
use App\Models\User;
use App\Models\Product\Size;
use App\Models\Product\Brand;
use App\Models\Product\Color;
use App\Models\Product\Fabric;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Http\Router\ProductsPath;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs;



/* ---------------------------------SITE----------------------------------------------------- */
Breadcrumbs::register('home', function (Crumbs $crumbs) {
    $crumbs->push('Главная', route('home'));
});

Breadcrumbs::register('login', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Авторизация', route('login'));
});

Breadcrumbs::register('register', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Регистрация', route('register'));
});

Breadcrumbs::register('password.request', function (Crumbs $crumbs) {
    $crumbs->parent('login');
    $crumbs->push('Сброс пароля', route('password.request'));
});

Breadcrumbs::register('password.reset', function (Crumbs $crumbs) {
    $crumbs->parent('password.request');
    $crumbs->push('Изменить', route('password.reset'));
});

Breadcrumbs::register('products.home', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Товары');
});

Breadcrumbs::register('products.show', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('products.home');
    $crumbs->push($product->code, route('products.show', $product));
});

Breadcrumbs::register('products.catalog.category', function (Crumbs $crumbs, ProductsPath $path) {
    if ($path->category && $parent = $path->category->parent) {
        $crumbs->parent('products.catalog.category', $path->withCategory($parent));
    } else {
        $crumbs->parent('home');
    }  

    if ($path->category) {
        $crumbs->push($path->category->title, route('products.catalog', $path));
    }
});
Breadcrumbs::register('products.catalog', function (Crumbs $crumbs, ProductsPath $path) {
    $crumbs->parent('products.catalog.category', $path);
});
/* ---------------------------------CABINET--------------------------------- */
Breadcrumbs::register('cabinet.home', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Кабинет');
});

Breadcrumbs::register('cabinet.card.index', function (Crumbs $crumbs) {
    $crumbs->parent('cabinet.home');
    $crumbs->push('Корзина', route('cabinet.card.index'));
});

Breadcrumbs::register('cabinet.profile.index', function (Crumbs $crumbs) {
    $crumbs->parent('cabinet.home');
    $crumbs->push('Профиль', route('cabinet.profile.index'));
});
/* ---------------------------------CABINET--------------------------------- */
/* ---------------------------------SITE------------------------------------------------------------ */




/* ----------------------------------------------------ADMINPANEL-------------------------------------------------- */

Breadcrumbs::register('admin.home', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('AdminPanel', route('admin.home'));
});

/* ---------------------------------PRODUCTS--------------------------------- */
Breadcrumbs::register('admin.products.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Products', route('admin.products.index'));
});

Breadcrumbs::register('admin.products.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.products.index');
    $crumbs->push('Create', route('admin.products.create'));
});

Breadcrumbs::register('admin.products.show', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.products.index');
    $crumbs->push($product->code, route('admin.products.show', $product));
});

Breadcrumbs::register('admin.products.edit', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.products.show', $product);
    $crumbs->push('Change', route('admin.products.edit', $product));
});
Breadcrumbs::register('admin.products.edit.photos', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.products.show', $product);
    $crumbs->push('Photos', route('admin.products.edit.photos', $product));
});

Breadcrumbs::register('admin.products.edit.preview', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.products.show', $product);
    $crumbs->push('preview', route('admin.products.edit.preview', $product));
});
/* ---------------------------------PRODUCTS--------------------------------- */

/* ---------------------------------USERS--------------------------------- */
Breadcrumbs::register('admin.users.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Users', route('admin.users.index'));
});

Breadcrumbs::register('admin.users.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.users.index');
    $crumbs->push('Create', route('admin.users.create'));
});

Breadcrumbs::register('admin.users.show', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('admin.users.index');
    $crumbs->push($user->name, route('admin.users.show', $user));
});

Breadcrumbs::register('admin.users.edit', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('admin.users.show', $user);
    $crumbs->push('Edit', route('admin.users.edit', $user));
});
/* ---------------------------------USERS--------------------------------- */

/* ---------------------------------CATEGORIES--------------------------------- */
Breadcrumbs::register('admin.categories.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Categories', route('admin.categories.index'));
});

Breadcrumbs::register('admin.categories.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.categories.index');
    $crumbs->push('Create', route('admin.categories.create'));
});

Breadcrumbs::register('admin.categories.show', function (Crumbs $crumbs, Category $category) {
    $crumbs->parent('admin.categories.index');
    $crumbs->push($category->title, route('admin.categories.show', $category));
});

Breadcrumbs::register('admin.categories.edit', function (Crumbs $crumbs, Category $category) {
    $crumbs->parent('admin.categories.show', $category);
    $crumbs->push('Edit', route('admin.categories.edit', $category));
});
/* ---------------------------------CATEGORIES--------------------------------- */

/* ---------------------------------BRANDS--------------------------------- */
Breadcrumbs::register('admin.brands.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Brands', route('admin.brands.index'));
});

Breadcrumbs::register('admin.brands.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.brands.index');
    $crumbs->push('Create', route('admin.brands.create'));
});

Breadcrumbs::register('admin.brands.show', function (Crumbs $crumbs, Brand $brands) {
    $crumbs->parent('admin.brands.index');
    $crumbs->push($brands->title, route('admin.brands.show', $brands));
});

Breadcrumbs::register('admin.brands.edit', function (Crumbs $crumbs, Brand $brands) {
    $crumbs->parent('admin.brands.show', $brands);
    $crumbs->push('Edit', route('admin.brands.edit', $brands));
});
/* ---------------------------------BRANDS--------------------------------- */

/* ---------------------------------FABRICS--------------------------------- */
Breadcrumbs::register('admin.fabrics.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Fabrics', route('admin.fabrics.index'));
});

Breadcrumbs::register('admin.fabrics.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.fabrics.index');
    $crumbs->push('Create', route('admin.fabrics.create'));
});

Breadcrumbs::register('admin.fabrics.show', function (Crumbs $crumbs, Fabric $fabric) {
    $crumbs->parent('admin.fabrics.index');
    $crumbs->push($fabric->title, route('admin.fabrics.show', $fabric));
});

Breadcrumbs::register('admin.fabrics.edit', function (Crumbs $crumbs, Fabric $fabric) {
    $crumbs->parent('admin.fabrics.show', $fabric);
    $crumbs->push('Edit', route('admin.fabrics.edit', $fabric));
});
/* ---------------------------------FABRICS--------------------------------- */

/* ---------------------------------COLORS--------------------------------- */
Breadcrumbs::register('admin.colors.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Colors', route('admin.colors.index'));
});

Breadcrumbs::register('admin.colors.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.colors.index');
    $crumbs->push('Create', route('admin.colors.create'));
});

Breadcrumbs::register('admin.colors.show', function (Crumbs $crumbs, Color $color) {
    $crumbs->parent('admin.colors.index');
    $crumbs->push($color->title, route('admin.colors.show', $color));
});

Breadcrumbs::register('admin.colors.edit', function (Crumbs $crumbs, Color $color) {
    $crumbs->parent('admin.colors.show', $color);
    $crumbs->push('Edit', route('admin.colors.edit', $color));
});
/* ---------------------------------COLORS--------------------------------- */

/* ---------------------------------SIZES--------------------------------- */
Breadcrumbs::register('admin.sizes.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Sizes', route('admin.sizes.index'));
});

Breadcrumbs::register('admin.sizes.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.sizes.index');
    $crumbs->push('Create', route('admin.sizes.create'));
});

Breadcrumbs::register('admin.sizes.show', function (Crumbs $crumbs, Size $size) {
    $crumbs->parent('admin.sizes.index');
    $crumbs->push($size->title, route('admin.sizes.show', $size));
});

Breadcrumbs::register('admin.sizes.edit', function (Crumbs $crumbs, Size $size) {
    $crumbs->parent('admin.sizes.show', $size);
    $crumbs->push('Edit', route('admin.sizes.edit', $size));
});
/* ---------------------------------SIZES--------------------------------- */

/* ----------------------------------------------------ADMINPANEL-------------------------------------------------- */
