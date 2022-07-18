
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate ;

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
Auth::routes();

Route::group([ 'prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'] ], function(){



    Route::get('/', function () {
        return redirect('login');
    });


    Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth']);
    Route::get('/customers', 'HomeController@customers')->name('customers');
    Route::get('/customer_profile/{id}', 'CustomerController@show')->name('customer_profile');
    Route::get('/customer_create', 'CustomerController@create')->name('customer_profile');
    Route::post('/SaveCustoemr','CustomerController@store')->name('save_customer');
    Route::get('/customers','CustomerController@index')->name('customers');
    Route::get('/customers/editcustomer/{customer}','CustomerController@edit')->name('customer_edit');
    Route::POST('/customer/updatecustomer/{customer}','CustomerController@update')->name('customer_update');

//    =====================contacts Routes ===============================

    Route::get('showcontactrecourd/{customer}','ContactLogController@show')->name('add_contacts');
    Route::POST('/contacts/addingcustomercontact/{customer}','ContactLogController@store')->name('adding_contact');


    //======================== users routes ===============================================

    Route::get('/users','UserController@index');//->middleware(['auth']);
    Route::get('/users/create','UserController@create');//->middleware(['auth']);
    Route::post('/users/store','UserController@store');//
    Route::get('/users/edit/{user}','UserController@edit');//->middleware(['auth']);
    Route::patch('/users/update/{user}','UserController@update');//->middleware(['auth']);;
    Route::delete('/users/delete/{user}','UserController@destroy');




    //======================================setting section routes ==============================

    Route::get('system/company/setting','SettingController@show')->name('sysetting')->middleware('auth');
    Route::POST('/settings/save/companysetting','settingController@store')->name('save_setting')->middleware('auth');




    Route::POST('/setting/update_company_profile/{company_profiles}','CompanyProfilesController@update');





    //=======================================PDF files generate routes ===================================

    Route::get('/generate-pdf','pdffilesController@generatePDF');



    //=============================================== quotations routes ===============================================

    Route::get('/quotations/create/{customer}','QuotationController@create')->name('create_quotations');
    Route::post('/qoutations/saveqoutation/{customer}','QuotationController@store')->name('qoutation_save')->middleware('auth');




});



//use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
