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



// Route::get('/','LandingController@index')->name('landing.index');
Route::get('/','DashboardController@index')->name('dashboard.index');

Auth::routes(['verify' => true]);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
//Auth::routes();

Route::get('/home', 'DashboardController@index')->name('home')->middleware('forcechangepassword');
Route::get('/registration', 'Auth\RegisterController@showRegistrationForm')->name('registration');
//Route::post('/register_user', 'Auth\RegisterController@register')->name('register_user');
Route::get('/forbiden', function(){
    return view('auth.forbidenpage');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::get('/auth/login', function(){
    return view('auth.login');
});


Route::group(['middleware' => ['cors']], function () {
    Route::resource('/api/page', 'Master\PageController', ['except' => 'show']);
    Route::post('api/page/filter', 'Master\PageController@index');
});

Route::group(['middleware' => ['auth', 'verified', 'role:Super Admin|Kasir|Owner|Admin|Surveyor|LE|Pemda']], function () {
    Route::get('/auth/changepassword','Auth\ForceChangePasswordController@index')->name('auth.change');
    Route::post('/auth/changepassword', 'Auth\ForceChangePasswordController@changepassword');

    Route::group(['middleware' => ['forcechangepassword']], function () {
        Route::get('/admin','DashboardController@index')->name('dashboard.index');
        Route::get('/amn','DashboardController@index')->name('dashboard.index');

        Route::get('/page/{id}/changestatus', 'Master\PageController@changestatus')->name('page.changestatus');
        Route::get('/page/{id}/wizard', 'Master\PageController@wizard')->name('page.wizard');
        Route::put('/page/{id}/wizardstore', 'Master\PageController@wizardstore')->name('page.wizardstore');
        Route::get('/page/{id}/configuration', 'Master\PageController@configuration')->name('page.configuration');
        Route::put('/page/{id}/configurationstore', 'Master\PageController@configurationstore')->name('page.configurationstore');
        Route::resource('/page', 'Master\PageController');
        Route::get('/page/{id}/delete','Master\PageController@softdelete')->name('page.delete');
        Route::get('/page/{id}/softdelete','Master\PageController@softdelete')->name('page.softdelete');
        Route::post('/page/filter', 'Master\PageController@index')->name('page.filter');

        Route::resource('/user', 'Master\UserController');
        Route::post('/user/filter', 'Master\UserController@index')->name('user.filter');
        Route::get('/user/{id}/delete', 'Master\UserController@softdelete')->name('user.delete');
        Route::get('/user/{id}/softdelete','Master\UserController@softdelete')->name('user.softdelete');
        
        Route::get('/userprofile/{id}','UserProfileController@index');

        Route::resource('/story', 'StoryController');
        Route::post('/story/filter', 'StoryController@index')->name('story.filter');
        Route::get('story/{id}/delete', 'StoryController@softdelete')->name('story.delete');
        Route::get('/story/{id}/softdelete', 'StoryController@softdelete')->name('story.softdelete');

        Route::resource('/optgroup', 'OptgroupController');
        Route::post('/optgroup/filter', 'OptgroupController@index')->name('optgroup.filter');
        Route::get('optgroup/{id}/delete', 'OptgroupController@softdelete')->name('optgroup.delete');
        Route::get('/optgroup/{id}/softdelete', 'OptgroupController@softdelete')->name('optgroup.softdelete');

        Route::resource('/optvalue', 'OptvalueController');
        Route::post('/optvalue/filter', 'OptvalueController@index')->name('optvalue.filter');
        Route::get('optvalue/{id}/delete', 'OptvalueController@softdelete')->name('optvalue.delete');
        Route::get('/optvalue/{id}/softdelete', 'OptvalueController@softdelete')->name('optvalue.softdelete');

        Route::get('/report', 'ReportController@index')->name('report.index');
        Route::post('/report/export', 'ReportController@export')->name('report.export');
        Route::post('/report/export_maat', 'ReportController@export_maat')->name('report.export_maat');
        Route::post('/report/export_ba', 'ReportController@export_ba')->name('report.export_ba');

        Route::resource('/outlet', 'OutletController');
        Route::post('/outlet/filter', 'OutletController@index')->name('outlet.filter');
        Route::get('outlet/{id}/delete', 'OutletController@softdelete')->name('outlet.delete');
        Route::get('/outlet/{id}/softdelete', 'OutletController@softdelete')->name('outlet.softdelete');
        Route::get('/outlet/{id}/changestatus', 'OutletController@changestatus')->name('outlet.changestatus');

        Route::resource('/province', 'ProvinceController');
        Route::post('/province/filter', 'ProvinceController@index')->name('province.filter');
        Route::get('province/{id}/delete', 'ProvinceController@softdelete')->name('province.delete');
        Route::get('/province/{id}/softdelete', 'ProvinceController@softdelete')->name('province.softdelete');
        Route::get('/province/{id}/changestatus', 'ProvinceController@changestatus')->name('province.changestatus');

        Route::resource('/price', 'PriceController');
        Route::post('/price/filter', 'PriceController@index')->name('price.filter');
        Route::get('price/{id}/delete', 'PriceController@softdelete')->name('price.delete');
        Route::get('/price/{id}/softdelete', 'PriceController@softdelete')->name('price.softdelete');
        Route::get('/price/{id}/changestatus', 'PriceController@.changestatus')->name('price.changestatus');

        Route::resource('/discount', 'DiscountController');
        Route::post('/discount/filter', 'DiscountController@index')->name('discount.filter');
        Route::get('discount/{id}/delete', 'DiscountController@softdelete')->name('discount.delete');
        Route::get('/discount/{id}/softdelete', 'DiscountController@softdelete')->name('discount.softdelete');
        Route::get('/discount/{id}/changestatus', 'DiscountController@changestatus')->name('discount.changestatus');

        Route::resource('/ekspedisi', 'EkspedisiController');
        Route::post('/ekspedisi/filter', 'EkspedisiController@index')->name('ekspedisi.filter');
        Route::get('ekspedisi/{id}/delete', 'EkspedisiController@softdelete')->name('ekspedisi.delete');
        Route::get('/ekspedisi/{id}/softdelete', 'EkspedisiController@softdelete')->name('ekspedisi.softdelete');
        Route::get('/ekspedisi/{id}/changestatus', 'EkspedisiController@changestatus')->name('ekspedisi.changestatus');

        Route::get('/product/{id}/getDetailAjx', 'ProductController@getDetailAjx')->name('product.getDetailAjx');
        Route::get('/product/{id}/getProductListByParam', 'ProductController@getProductListByParam')->name('product.getProductListByParam');
        Route::resource('/product', 'ProductController');
        Route::post('/product/filter', 'ProductController@index')->name('product.filter');
        Route::get('product/{id}/delete', 'ProductController@softdelete')->name('product.delete');
        Route::get('/product/{id}/softdelete', 'ProductController@softdelete')->name('product.softdelete');
        Route::get('/product/{id}/changestatus', 'ProductController@changestatus')->name('product.changestatus');

        Route::resource('/stock', 'StockController');
        Route::post('/stock/filter', 'StockController@index')->name('stock.filter');
        Route::get('stock/{id}/delete', 'StockController@softdelete')->name('stock.delete');
        Route::get('/stock/{id}/softdelete', 'StockController@softdelete')->name('stock.softdelete');
        Route::get('/stock/{id}/changestatus', 'StockController@changestatus')->name('stock.changestatus');


        Route::post('/order/addCustomerFormOrder', 'CustomerController@store')->name('order.addCustomerFormOrder');
        Route::get('/customer/{param}/getCustomerByName', 'CustomerController@getCustomerByName')->name('customer.getCustomerByName');
        Route::resource('/customer', 'CustomerController');
        Route::post('/customer/filter', 'CustomerController@index')->name('customer.filter');
        Route::get('customer/{id}/delete', 'CustomerController@softdelete')->name('customer.delete');
        Route::get('/customer/{id}/softdelete', 'CustomerController@softdelete')->name('customer.softdelete');
        Route::get('/customer/{id}/changestatus', 'CustomerController@changestatus')->name('customer.changestatus');

        Route::resource('/shipment', 'ShipmentController');
        Route::post('/shipment/filter', 'ShipmentController@index')->name('shipment.filter');
        Route::get('shipment/{id}/delete', 'ShipmentController@softdelete')->name('shipment.delete');
        Route::get('/shipment/{id}/softdelete', 'ShipmentController@softdelete')->name('shipment.softdelete');
        Route::get('/shipment/{id}/changestatus', 'ShipmentController@changestatus')->name('shipment.changestatus');

        Route::post('/order/save_transaction', 'OrderController@store')->name('order.save_transaction');
        Route::post('/order/update_transaction', 'OrderController@pay_bill')->name('order.update_transaction');
        Route::get('/order/{id}/export_bill', 'OrderController@export_bill')->name('order.export_bill');
        Route::get('/order/{id}/preview_bill', 'OrderController@preview_bill')->name('order.preview_bill');
        Route::get('/order/{id}/invoice', 'OrderController@invoice')->name('order.invoice');
        Route::resource('/order', 'OrderController');
        Route::post('/order/filter', 'OrderController@index')->name('order.filter');
        Route::get('order/{id}/delete', 'OrderController@softdelete')->name('order.delete');
        Route::get('/order/{id}/softdelete', 'OrderController@softdelete')->name('order.softdelete');
        Route::get('/order/{id}/changestatus', 'OrderController@changestatus')->name('order.changestatus');

        Route::resource('/detailorder', 'DetailorderController');
        Route::post('/detailorder/filter', 'DetailorderController@index')->name('detailorder.filter');
        Route::get('detailorder/{id}/delete', 'DetailorderController@softdelete')->name('detailorder.delete');
        Route::get('/detailorder/{id}/softdelete', 'DetailorderController@softdelete')->name('detailorder.softdelete');

        Route::resource('/cart', 'CartController');
        Route::post('/cart/filter', 'CartController@index')->name('cart.filter');
        Route::get('cart/{id}/delete', 'CartController@softdelete')->name('cart.delete');

        Route::get('/detailcart/{product_id}/getSpecificCart', 'DetailcartController@getSpecificCart')->name('detailcart.getSpecificCart');
        Route::get('/detailcart/getAllCart', 'DetailcartController@getAllCart')->name('detailcart.getAllCart');
        Route::post('/detailcart/addRemoveCartItem', 'DetailcartController@addRemoveCartItem')->name('detailcart.addRemoveCartItem');
        Route::post('/detailcart/addToCart', 'DetailcartController@store')->name('detailcart.addToCart');
        Route::post('/detailcart/deleteFromCart', 'DetailcartController@deleteFromCart')->name('detailcart.deleteFromCart');
        Route::get('/detailcart/emptyByUser', 'DetailcartController@emptyByUser')->name('detailcart.emptyByUser');
        Route::get('/detailcart/getCountByUser', 'DetailcartController@getCountByUser')->name('detailcart.getCountByUser');
        Route::resource('/detailcart', 'DetailcartController');
        Route::post('/detailcart/filter', 'DetailcartController@index')->name('detailcart.filter');
        Route::get('detailcart/{id}/delete', 'DetailcartController@softdelete')->name('detailcart.delete');

        Route::get('pelaksana/{id}/getPelaksana', 'PelaksanaController@getPelaksana')->name('pelaksana.getPelaksana');
        Route::resource('/pelaksana', 'PelaksanaController');
        Route::post('/pelaksana/filter', 'PelaksanaController@index')->name('pelaksana.filter');
        Route::get('pelaksana/{id}/delete', 'PelaksanaController@softdelete')->name('pelaksana.delete');
        Route::get('/pelaksana/{id}/softdelete', 'PelaksanaController@softdelete')->name('pelaksana.softdelete');
        Route::get('/pelaksana/{id}/changestatus', 'PelaksanaController@changestatus')->name('pelaksana.changestatus');
        Route::get('pelaksana/{id}/assigntask', 'PelaksanaController@assigntask')->name('pelaksana.assigntask');
        Route::post('/pelaksana/storetask', 'PelaksanaController@storetask')->name('pelaksana.storetask');
        Route::put('/pelaksana/updatetask', 'PelaksanaController@updatetask')->name('pelaksana.updatetask');

        Route::resource('/projects', 'ProjectsController');
        Route::post('/projects/filter', 'ProjectsController@index')->name('projects.filter');
        Route::get('projects/{id}/delete', 'ProjectsController@softdelete')->name('projects.delete');
        Route::get('/projects/{id}/softdelete', 'ProjectsController@softdelete')->name('projects.softdelete');
        Route::get('/projects/{id}/changestatus', 'ProjectsController@changestatus')->name('projects.changestatus');
        Route::get('/projects/{id}/cetak_pdf', 'ProjectsController@cetak_pdf');
        Route::get('projects/{id}/fill', 'ProjectsController@fill')->name('projects.fill');
        Route::post('projects/storeprogres', 'ProjectsController@storeprogres')->name('projects.storeprogres');
        Route::get('projects/{id}/ba_pdf', 'ProjectsController@ba_pdf')->name('projects.ba_pdf');

        Route::resource('/area', 'AreaController');
        Route::post('/area/filter', 'AreaController@index')->name('area.filter');
        Route::get('area/{id}/delete', 'AreaController@softdelete')->name('area.delete');
        Route::get('/area/{id}/softdelete', 'AreaController@softdelete')->name('area.softdelete');
        Route::get('/area/{id}/changestatus', 'AreaController@changestatus')->name('area.changestatus');

        Route::get('baseline/getBaselinePartial', 'BaselineController@getBaselinePartial')->name('baseline.getBaselinePartial');
        Route::get('baseline/{id}/getBaseline', 'BaselineController@getBaseline')->name('baseline.getBaseline');
        Route::resource('/baseline', 'BaselineController');
        Route::post('/baseline/filter', 'BaselineController@index')->name('baseline.filter');
        Route::get('baseline/{id}/delete', 'BaselineController@softdelete')->name('baseline.delete');
        Route::get('/baseline/{id}/softdelete', 'BaselineController@softdelete')->name('baseline.softdelete');
        Route::get('/baseline/{id}/changestatus', 'BaselineController@changestatus')->name('baseline.changestatus');
        Route::get('/baseline/export_excel', 'BaselineController@export_excel');
        Route::post('/baseline/import_excel', 'BaselineController@import_excel');
        
        Route::get('storage/{directory}/img/{filename}', function ($directory, $filename)
        {
            //return Image::make('/home/kmthibah/laravel/storage/app/public/130820051125/error_1.PNG')->response();
    $path = storage_path('app/public/'.$directory.'/'.$filename);
//dd(File::exists('/home/kmthibah/laravel/storage/app/public/130820051125/error_1.PNG'));
    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
        });
    });

	Route::resource('/userprofile', 'UserprofileController');
	Route::post('/userprofile/filter', 'UserprofileController@index')->name('userprofile.filter'); 
	Route::get('userprofile/{id}/delete', 'UserprofileController@softdelete')->name('userprofile.delete');
	Route::get('/userprofile/{id}/softdelete', 'UserprofileController@softdelete')->name('userprofile.softdelete');
    Route::get('/userprofile/{id}/changestatus', 'UserprofileController@changestatus')->name('userprofile.changestatus');
    Route::post('/userprofile/changepassword', 'UserprofileController@changepassword')->name('userprofile.changepassword');

	Route::resource('/configuration', 'ConfigurationController');
	Route::post('/configuration/filter', 'ConfigurationController@index')->name('configuration.filter'); 
    Route::get('configuration/{id}/delete', 'ConfigurationController@softdelete')->name('configuration.delete');
    Route::get('/configuration/{id}/softdelete', 'ConfigurationController@softdelete')->name('configuration.softdelete');
    Route::get('/configuration/{id}/changestatus', 'ConfigurationController@changestatus')->name('configuration.changestatus'); 

    Route::get('/user/tes/generateuserpemda', 'Master\UserController@generateuserpemda')->name('user.generateuserpemda'); 
	Route::resource('/user', 'Master\UserController');
	Route::post('/user/filter', 'Master\UserController@index')->name('user.filter'); 
    Route::get('user/{id}/delete', 'Master\UserController@softdelete')->name('user.delete'); 
    Route::get('/user/{id}/softdelete', 'Master\UserController@softdelete')->name('user.softdelete');
    Route::get('/user/{id}/changestatus', 'Master\UserController@changestatus')->name('user.changestatus');

    Route::get('/userpemda/generate/generateuserpemda', 'UserPemdaController@generateuserpemda')->name('userpemda.generateuserpemda'); 
	Route::resource('/userpemda', 'UserPemdaController');
	Route::post('/userpemda/filter', 'UserPemdaController@index')->name('userpemda.filter'); 
    Route::get('userpemda/{id}/delete', 'UserPemdaController@softdelete')->name('userpemda.delete'); 
    Route::get('/userpemda/{id}/softdelete', 'UserPemdaController@softdelete')->name('userpemda.softdelete');
    Route::get('/userpemda/{id}/changestatus', 'UserPemdaController@changestatus')->name('userpemda.changestatus');

	Route::resource('/le', 'LeController');
	Route::post('/le/filter', 'LeController@index')->name('le.filter'); 
    Route::get('le/{id}/delete', 'LeController@softdelete')->name('le.delete'); 
    Route::get('/le/{id}/softdelete', 'LeController@softdelete')->name('le.softdelete');
    Route::get('/le/{id}/changestatus', 'LeController@changestatus')->name('le.changestatus');

    Route::resource('/task', 'TaskController');
	Route::post('/task/filter', 'TaskController@index')->name('task.filter'); 
    Route::get('task/{id}/delete', 'TaskController@softdelete')->name('task.delete'); 
    Route::get('/task/{id}/softdelete', 'TaskController@softdelete')->name('task.softdelete');
    Route::get('/task/{id}/changestatus', 'TaskController@changestatus')->name('task.changestatus');
});
