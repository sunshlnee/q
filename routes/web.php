<?php

Route::get('/', 'PageController')->name('home');
Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');

Route::group([
    'prefix' => 'ajax',
    'as' => 'ajax.',
], function () {
    Route::post('/cart-count', 'Products\CardController@getCount')->name('cart.count')->middleware('auth');
});

Auth::routes();

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['can:admin-panel'],
], function () {
    Route::get('/', 'HomeController')->name('home');
    Route::resource('users', 'UsersController');
    Route::resource('brands', 'BrandsController');
    Route::resource('colors', 'ColorsController');
    Route::resource('sizes', 'SizesController');
    Route::resource('fabrics', 'FabricsController');
    Route::resource('categories', 'CategoriesController');

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', 'ProductsController@index')->name('index');
        Route::post('/', 'ProductsController@store')->name('store');
        Route::get('/create', 'ProductsController@create')->name('create');
        Route::get('/{product}/edit', 'ProductsController@edit')->name('edit');
        Route::put('/{product}/edit', 'ProductsController@update')->name('update');
        Route::get('/{product}/edit/photos', 'ProductsController@photosForm')->name('edit.photos');
        Route::post('/{product}/edit/photos', 'ProductsController@photos');
        Route::get('/{product}/edit/preview', 'ProductsController@photoPreviewForm')->name('edit.preview');
        Route::post('/{product}/edit/preview', 'ProductsController@photoPreview');
        Route::get('/{product}/show', 'ProductsController@show')->name('show');
        Route::post('/show/{product}/recommend', 'ProductsController@recommend')->name('recommend');
        Route::delete('/{product}/destroy', 'ProductsController@destroy')->name('destroy');
    });
});

Route::group([
    'prefix' => 'products',
    'as' => 'products.',
    'namespace' => 'Products',
], function () {
    Route::get('/show/{product}', 'ProductController@show')->name('show');
    Route::post('/show/{product}/card', 'CardController@add')->name('card');
    Route::delete('/show/{product}/card', 'CardController@remove');
    Route::get('/{products_path?}', 'ProductController@catalog')->name('catalog')->where('products_path', '.+');
});

Route::group([
    'prefix' => 'cabinet',
    'as' => 'cabinet.',
    'namespace' => 'Cabinet',
    'middleware' => 'auth',
], function () {
    Route::group(['prefix' => 'card', 'as' => 'card.'], function () {
        Route::get('/', 'CardController@index')->name('index');
        Route::delete('/remove/{product}', 'CardController@remove')->name('remove');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', 'ProfileController@index')->name('index');
        Route::put('/edit/{user}', 'ProfileController@edit')->name('edit');
    });
});