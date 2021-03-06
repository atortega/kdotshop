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

/* ___________________USER SIDE___________________ */

Route::get('/', 'MainController@index');


Route::get('/customers/list', 'CustomersController@customersList');
Route::get('/customers/add', 'CustomersController@addCustomer');

Route::get('/sizes/get/{id}', 'SizesController@getProductSizeById');
Route::get('/colors/get/{id}', 'ColorsController@getProductColorById');
Route::get('/customers/get/{id}', 'CustomersController@getCustomerById');
Route::get('/categories/get/{id}', 'CategoriesController@getProductCategoryById');
Route::get('/sub-categories/get/{id}', 'SubCategoriesController@getProductSubCategoryById');


// U S E R . A C C O U N T S
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// S I G N - U P & L O G I N (Updated Version)
Route::get('/signup', function () {
    return view('user.templates.page-signup');
});
Route::post('/signup/submit', 'CustomersController@createCustomer');

//Route::get('/login', 'CustomersController@loginFormCustomer');
//Route::post('/login/submit', 'CustomersController@loginCustomer');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// P A G E . A C C O U N T
Route::get('/account', function () {
    return view('user.templates.page-account');
});
Route::get('/updateProfile', function () {
    return view('user.templates.editprofile');
});
Route::get('/updatePassword', function () {
    return view('user.templates.updatePassword');
});
Route::get('/addresses', function () {
    return view('user.templates.addresses');
});
Route::get('/updateProfile', 'CustomersController@updateProfileForm');
Route::post('/saveProfile', 'CustomersController@saveProfile');
Route::post('/change-password', 'CustomersController@changePassword');

Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');

// P A G E - V E R I F I C A T I O N
Route::get('page-verificationCode', function () {
    return view('user.templates.page-verificationCode');
});
//P U R C H A S E  P A G E
Route::get('/purchase', function () {
    return view('user.templates.myPurchase');
});
// P R O D U C T S - P A G E
Route::get('/product', function () {
    return view('user.templates.product');
});
Route::get('/products/get/{id}', 'ProductsController@getProductById');
Route::get('/product', 'ProductsController@paginateProducts');
Route::get('/products/sub-categories/get/{category_id}', 'ProductsController@getProducSubCategoriesByCategoryId');
Route::get('/shop-productDetails/{id?}', 'ProductsController@getProductDetailsById');

// A B O U T - P A G E
Route::get('/about-us', function () {
    return view('user.templates.about_page');
});

// S H O P - C A R T
Route::get('/shop-cart', function () {
    return view('user.templates.shop-cart');
});
Route::post('/cart-add', 'CartController@addToCart');
Route::get('/shop-cart', 'CartController@cartShow');
Route::post('/cart-update', 'CartController@cartUpdate');
Route::get('/cart-remove/{rowId}', 'CartController@cartRemove');
Route::get('/cart-destroy', 'CartController@cartDestroy');

// S H O P - C H E C K O U T
Route::get('/shop-checkout', function () {
    return view('user.templates.shop-checkout');
});
Route::get('/shop-checkout','CartController@cartShowCheckout');
Route::post('/shop-checkout', 'CheckoutDetailsController@billingInfo'); // SURE?
Route::post('/shop-checkout', 'CheckoutDetailsController@shipInfo');    // SURE?

// S H O P - C H E C K O U T P A Y M E N T
Route::get('/shop-checkoutPayment', function () {
    return view('user.templates.shop-checkoutPayment');
});

// S H O P - C H E C K O U T R E V I E W
Route::get('/shop-checkoutReview', function () {
    return view('user.templates.shop-checkoutReview');
});
Route::get('/shop-checkoutReview','CartController@cartShowCheckoutReview');

// S H O P - C H E C K O U T C O M P L E T E D
Route::get('/shop-checkoutCompleted', function () {
    return view('user.templates.shop-checkoutCompleted');
});

/*
// L O G I N - P A G E (Outdated Version)
Route::get('/page-login', function () {
    return view('user.templates.page-login');
});

// S I G N U P - P A G E (Outdated Version)
Route::get('/page-signup', function () {
    return view('user.templates.page-signup');
});
*/


/* ___________________ADMIN SIDE___________________ */

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
    Route::get('/products', function () {
        return view('admin.templates.products-list');
    });


    //Orders
    Route::get('/orders/index', 'OrdersController@index');
    Route::get('/orders', function () {
        return view('admin.templates.orders-list');
    });


    //Payments
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
    Route::get('/sub-categories', 'SubCategoriesController@getProductSubCategoriesByCategoryId');
});