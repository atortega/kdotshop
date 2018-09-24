<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index');


Route::get('/customers/list', 'CustomersController@customersList');

Route::get('/customers/add', 'CustomersController@addCustomer');

Route::get('/sizes/get/{id}', 'SizesController@getProductSizeById');
Route::get('/colors/get/{id}', 'ColorsController@getProductColorById');
Route::get('/customers/get/{id}', 'CustomersController@getCustomerById');
Route::get('/categories/get/{id}', 'CategoriesController@getProductCategoryById');

Route::prefix('admin')->group(function () {
	Route::get('/', function () {
		return view('admin.templates.index');
	});


	//Customers
	Route::get('/customers', function () {
		return view('admin.templates.customers-list');
	});
    Route::get('/customers/create', function () {
        return view('admin.templates.customers-create');
    });
    Route::post('/customers/create/save', 'CustomersController@addCustomer');
	Route::get('/customers/index', 'CustomersController@index');
    Route::post('/customers/delete', 'CustomersController@deleteCustomer');
    Route::post('/customers/edit', 'CustomersController@editCustomer');


    //Products
	Route::get('/products/index', 'ProductsController@index');
    Route::get('/products/create', 'ProductsController@createProduct');
    Route::post('/products/create/save', 'ProductsController@addNewProduct');
	Route::get('/products', 'ProductsController@productLists');
    Route::post('/products/edit', 'ProductsController@updateProduct');
    Route::post('/products/delete', 'ProductsController@deleteProduct');

	Route::get('/orders', function () {
		return view('admin.templates.orders-list');
	});

	Route::get('/orders/index', 'OrdersController@index');

	Route::get('/payments/index', 'PaymentsController@index');

	Route::get('/payments', function () {
		return view('admin.templates.payments-list');
	});


	//Colors
	Route::get('/colors/index', 'ColorsController@index');
    Route::post('/colors/create/save', 'ColorsController@addNew');
    Route::post('/colors/edit', 'ColorsController@editProductColor');
    Route::post('/colors/delete', 'ColorsController@deleteProductColor');
    Route::get('/colors', function () {
        return view('admin.templates.colors-list');
    });
    Route::get('/colors/create', function () {
        return view('admin.templates.colors-create');
    });

	//Sizes
	Route::get('/sizes/index', 'SizesController@index');
    Route::post('/sizes/edit', 'SizesController@editProductSize');
    Route::post('/sizes/delete', 'SizesController@deleteProductSize');
    Route::post('/sizes/create/save', 'SizesController@addNew');
	Route::get('/sizes', function () {
		return view('admin.templates.sizes-list');
	});
	Route::get('/sizes/create', function () {
		return view('admin.templates.sizes-create');
	});



	//Categories
    Route::get('/categories/create', function () {
        return view('admin.templates.category-create');
    });
    Route::get('/categories', function () {
        return view('admin.templates.categories-list');
    });
    Route::get('/categories/index', 'CategoriesController@index');
    Route::post('/categories/create/save', 'CategoriesController@addNew');
    Route::post('/categories/edit', 'CategoriesController@editProductCategory');
    Route::post('/categories/delete', 'CategoriesController@deleteProductCategory');


    //Sub Categories
    Route::get('/sub-categories/create', function () {
        return view('admin.templates.sub-categories-create');
    });
    Route::get('/sub-categories', function () {
        return view('admin.templates.sub-categories-list');
    });
    Route::get('/sub-categories/index', 'SubCategoriesController@index');
    Route::post('/sub-categories/create/save', 'SubCategoriesController@addNew');
    Route::post('/sub-categories/edit', 'SubCategoriesController@editProductSubCategory');
    Route::post('/sub-categories/delete', 'SubCategoriesController@deleteProductSubCategory');
    Route::get('/sub-categories/get/{category_id}', 'SubCategoriesController@getProductSubCategoriesByCategoryId');
});


Route::get('/product', function () {
    return view('user.html.templates.product');
});
Route::get('/about_page', function () {
    return view('user.html.templates.about_page');
});