<?php

Route::get('/{any?}', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->prefix('admin/access')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Users Route
    Route::get('/user', 'UserController@index')->name('user.index');
    Route::get('/user/create', 'UserController@create')->name('user.create');
    Route::post('/user/store', 'UserController@store')->name('user.store');
    Route::get('/show/{id}', 'UserController@show')->name('user.show');
    Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/user/update/{id}', 'UserController@update')->name('user.update');
    Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
    
    // Product Category Route
    Route::get('/product-category', 'ProductCategoryController@index')->name('product.category.index');
    Route::get('/product-category/create', 'ProductCategoryController@create')->name('product.category.create');
    Route::post('/product-category/store', 'ProductCategoryController@store')->name('product.category.store');
    Route::get('/product-category/show/{id}', 'ProductCategoryController@show')->name('product.category.show');
    Route::get('/product-category/edit/{id}', 'ProductCategoryController@edit')->name('product.category.edit');
    Route::post('/product-category/update/{id}', 'ProductCategoryController@update')->name('product.category.update');
    Route::get('/product-category/destroy/{id}', 'ProductCategoryController@destroy')->name('product.category.destroy');
    
    // Product Route
    Route::get('/product', 'ProductController@index')->name('product.index');
    Route::get('/product/create', 'ProductController@create')->name('product.create');
    Route::post('/product/store', 'ProductController@store')->name('product.store');
    Route::get('/product/show/{id}', 'ProductController@show')->name('product.show');
    Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('/product/update/{id}', 'ProductController@update')->name('product.update');
    Route::get('/product/destroy/{id}', 'ProductController@destroy')->name('product.destroy');
    
    // Portfolio Category Route
    Route::get('/portfolio-category', 'PortfolioCategoryController@index')->name('portfolio.category.index');
    Route::get('/portfolio-category/create', 'PortfolioCategoryController@create')->name('portfolio.category.create');
    Route::post('/portfolio-category/store', 'PortfolioCategoryController@store')->name('portfolio.category.store');
    Route::get('/portfolio-category/show/{id}', 'PortfolioCategoryController@show')->name('portfolio.category.show');
    Route::get('/portfolio-category/edit/{id}', 'PortfolioCategoryController@edit')->name('portfolio.category.edit');
    Route::post('/portfolio-category/update/{id}', 'PortfolioCategoryController@update')->name('portfolio.category.update');
    Route::get('/portfolio-category/destroy/{id}', 'PortfolioCategoryController@destroy')->name('portfolio.category.destroy');
    
    // Portfolio Route
    Route::get('/portfolio', 'PortfolioController@index')->name('portfolio.index');
    Route::get('/portfolio/create', 'PortfolioController@create')->name('portfolio.create');
    Route::post('/portfolio/store', 'PortfolioController@store')->name('portfolio.store');
    Route::get('/portfolio/show/{id}', 'PortfolioController@show')->name('portfolio.show');
    Route::get('/portfolio/edit/{id}', 'PortfolioController@edit')->name('portfolio.edit');
    Route::post('/portfolio/update/{id}', 'PortfolioController@update')->name('portfolio.update');
    Route::get('/portfolio/destroy/{id}', 'PortfolioController@destroy')->name('portfolio.destroy');

      
    // About Route
    Route::get('/about', 'AboutController@index')->name('about.index');
    Route::get('/about/create', 'AboutController@create')->name('about.create');
    Route::post('/about/store', 'AboutController@store')->name('about.store');
    Route::get('/about/show/{id}', 'AboutController@show')->name('about.show');
    Route::get('/about/edit/{id}', 'AboutController@edit')->name('about.edit');
    Route::post('/about/update/{id}', 'AboutController@update')->name('about.update');
    Route::get('/about/destroy/{id}', 'AboutController@destroy')->name('about.destroy');
    
    // Service Route
    Route::get('/service', 'ServiceController@index')->name('service.index');
    Route::get('/service/create', 'ServiceController@create')->name('service.create');
    Route::post('/service/store', 'ServiceController@store')->name('service.store');
    Route::get('/service/show/{id}', 'ServiceController@show')->name('service.show');
    Route::get('/service/edit/{id}', 'ServiceController@edit')->name('service.edit');
    Route::post('/service/update/{id}', 'ServiceController@update')->name('service.update');
    Route::get('/service/destroy/{id}', 'ServiceController@destroy')->name('service.destroy');
    
    // Rating Route
    Route::get('/rating', 'RatingController@index')->name('rating.index');
    Route::get('/rating/create', 'RatingController@create')->name('rating.create');
    Route::post('/rating/store', 'RatingController@store')->name('rating.store');
    Route::get('/rating/show/{id}', 'RatingController@show')->name('rating.show');
    Route::get('/rating/edit/{id}', 'RatingController@edit')->name('rating.edit');
    Route::post('/rating/update/{id}', 'RatingController@update')->name('rating.update');
    Route::get('/rating/destroy/{id}', 'RatingController@destroy')->name('rating.destroy');
    
    // Testimonial Route
    Route::get('/testimonial', 'TestimonialController@index')->name('testimonial.index');
    Route::get('/testimonial/create', 'TestimonialController@create')->name('testimonial.create');
    Route::post('/testimonial/store', 'TestimonialController@store')->name('testimonial.store');
    Route::get('/testimonial/show/{id}', 'TestimonialController@show')->name('testimonial.show');
    Route::get('/testimonial/edit/{id}', 'TestimonialController@edit')->name('testimonial.edit');
    Route::post('/testimonial/update/{id}', 'TestimonialController@update')->name('testimonial.update');
    Route::get('/testimonial/destroy/{id}', 'TestimonialController@destroy')->name('testimonial.destroy');
    
    // Hire Route
    Route::get('/hire', 'HireController@index')->name('hire.index');
    Route::get('/hire/create', 'HireController@create')->name('hire.create');
    Route::post('/hire/store', 'HireController@store')->name('hire.store');
    Route::get('/hire/show/{id}', 'HireController@show')->name('hire.show');
    Route::get('/hire/edit/{id}', 'HireController@edit')->name('hire.edit');
    Route::post('/hire/update/{id}', 'HireController@update')->name('hire.update');
    Route::get('/hire/destroy/{id}', 'HireController@destroy')->name('hire.destroy');
    
    // Contact Route
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::post('/contact/store', 'ContactController@store')->name('contact.store');
    Route::get('/contact/create', 'ContactController@create')->name('contact.create');
    Route::get('/contact/show/{id}', 'ContactController@show')->name('contact.show');
    Route::get('/contact/edit/{id}', 'ContactController@edit')->name('contact.edit');
    Route::post('/contact/update/{id}', 'ContactController@update')->name('contact.update');
    Route::get('/contact/destroy/{id}', 'ContactController@destroy')->name('contact.destroy');

    // SEO Route
    Route::resource('seo', 'SEOController');
});

// Authentication Routes
Route::get('/admin/access/login', 'Auth\LoginController@showLoginForm');
Route::post('/admin/access/login', 'Auth\LoginController@login')->name('login');
Route::post('/admin/access/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/admin/access/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/admin/access/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/admin/access/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/admin/access/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/admin/access/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('/admin/access/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/admin/access/register', 'Auth\RegisterController@register')->name('register');


// Data Fetching Routes
Route::post('get-data/about', 'AboutController@get_data');
Route::post('get-data/services', 'ServiceController@get_data');
Route::post('get-data/portfolios', 'PortfolioController@get_data');
Route::post('get-data/products', 'ProductController@get_data');
Route::post('get-data/settings', 'SettingController@get_data');
Route::post('get-data/testimonials', 'TestimonialController@get_data');
Route::post('send-message', 'ContactController@send');

Route::post('hireme', 'HireController@send');
