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


	//////////////////////////////////////////////C U S T O M E R S///////////////////////////////////////////////////
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


    /////////////////////////////////////////////P R O D U C T S ////////////////////////////////////////////////////
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


	//////////////////////////////////////////////////C O L O R S///////////////////////////////////////////////////
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

	///////////////////////////////////////////////S I Z E S////////////////////////////////////////////////////////
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



	//////////////////////////////////////////////C A T E G O R I E S//////////////////////////////////////////////////
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


    /////////////////////////////////////////////////SUB- C A T E G O R I E S/////////////////////////////////////////
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
    return view('user.templates.product');
});
Route::get('/about_page', function () {
    return view('user.templates.about_page');
});

//updated

////////////////////////////////////////////////////S I G N - U P & L O G I N//////////////////////////////////////
Route::get('/signup', function () {
    return view('user.templates.page-signup');
});

Route::post('/signup/submit', 'CustomersController@createCustomer');

/*
Route::get('/login', function () {
    return view('user.templates.page-login');
});
*/

Route::get('/login', 'CustomersController@loginFormCustomer');
Route::post('/login/submit', 'CustomersController@loginCustomer');
//Route::post('/signup/verificationCode', 'CustomersController@getVerificationCode');


///////////////////////////////////////////V E R I F I C A T I O N C O D E////////////////////////////////////////////
Route::get('page-verificationCode', function () {
    return view('user.templates.page-verificationCode');
});
Route::post('/signup/submit', 'CustomersController@createCustomer');


////////////////////////////////////////////// U S E R P R O F I L E////////////////////////////////////////////////
Route::get('/', 'MainController@index');


Route::get('/customers/list', 'CustomersController@customersList');

Route::get('/customers/add', 'CustomersController@addCustomer');

Route::get('/sizes/get/{id}', 'SizesController@getProductSizeById');
Route::get('/colors/get/{id}', 'ColorsController@getProductColorById');
Route::get('/customers/get/{id}', 'CustomersController@getCustomerById');
Route::get('/categories/get/{id}', 'CategoriesController@getProductCategoryById');

/////////////////////////////////////////////////// P R O D U C T///////////////////////////////////////////////////////////
Route::get('/product', function () {
    return view('user.templates.product');
});

Route::get('/product', 'ProductsController@paginateProducts');

//////////////////////////////////////////////////////A B O U T U S////////////////////////////////////////////////////////

Route::get('/about-us', function () {
    return view('user.templates.about_page');
});



Route::get('/shop-productDetails', function () {
    return view('user.templates.shop-productDetails');
});
Route::get('/shop-productDetails/{id}', 'ProductDetailsController@getProductDetailsById')->name('getProductDetailsById');

Route::get('/sub-categories/get/{category_id}', 'ProductsController@getProducSubCategoriesByCategoryId');

Route::get('/shop-cart', function () {
    return view('user.templates.shop-cart');
});
Route::get('/shop-checkout', function () {
    return view('user.templates.shop-checkout');
});
Route::get('/shop-checkoutPayment', function () {
    return view('user.templates.shop-checkoutPayment');
});
Route::get('/shop-checkoutReview', function () {
    return view('user.templates.shop-checkoutReview');
});
Route::get('/shop-checkoutCompleted', function () {
    return view('user.templates.shop-checkoutCompleted');
});
/*Route::get('/page-login', function () {
    return view('user.templates.page-login');
});*/
/*Route::get('/page-signup', function () {
    return view('user.templates.page-signup');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

/*Page Account*/
Route::get('/account', function () {
    return view('user.templates.page-account');
});

Route::get('/updateProfile', function () {
    return view('user.templates.editprofile');
});
Route::get('/updatePassword', function () {
    return view('user.templates.updatePassword');
});