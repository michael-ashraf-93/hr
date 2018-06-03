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

//Route::get('/', function () {
//    return view('welcome');
//});


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'AuthController@login');
Route::post('/check', 'AuthController@check');
Route::get('/register', 'AuthController@create');
Route::post('/register', 'AuthController@store');
//Route::post('/storeuser','AuthController@storeuser');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/logout', 'AuthController@logout');
    Route::get('/', 'HomeController@index');
//
//    Route::get('add_employee', 'UserController@addUser');
//    Route::post('store_employee', 'UserController@storeUser');
//    Route::get('/add_department', 'UserController@addDepartment');
//    Route::post('/store_department', 'UserController@storeDepartment');
//
//
//    Route::post('store_region', 'UserController@storeRegion');
//    Route::post('store_country', 'UserController@storeCountry');
//    Route::get('add_location', 'UserController@addLocation');
//    Route::post('store_location', 'UserController@storeLocation');
//
//
//    Route::get('{id}/edit_employee', 'UserController@editEmployee');
//    Route::post('{id}/update_employee', 'UserController@updateEmployee');
//
//    Route::get('{id}/edit_manager', 'UserController@editManager');
//    Route::post('{id}/update_manager', 'UserController@updateManager');
//
//    Route::get('{id}/edit_department', 'UserController@editDepartment');
//    Route::post('{id}/update_department', 'UserController@updateDepartment');
//
//
//
//
//
//
//
//    Route::get('managers', 'UserController@managers');
//    Route::get('users', 'UserController@users');
//    Route::get('departments', 'UserController@departments');
//
//    Route::get('locations', 'UserController@locations');
//    Route::get('countries', 'UserController@countries');
//    Route::get('regions', 'UserController@regions');
//
//    Route::post('get-countries','UserController@CountryInRegion');
//
//
//    Route::get('/{id}/employee_destroy','Usercontroller@userDestroy');
//    Route::get('/{id}/department_destroy','Usercontroller@departmentDestroy');
//    Route::get('/{id}/location_destroy','Usercontroller@userLocation');


    Route::get('/back', 'HomeController@back');


    //User
    Route::get('/managers', 'UserController@Show_Managers');
    Route::get('user_create', 'UserController@Create');
    Route::prefix('/user')->group(function () {
        Route::get('/', 'UserController@Show');
        Route::post('/store', 'UserController@Store');
        Route::get('/{id}/edit', 'UserController@Edit');
        Route::post('/{id}/update', 'UserController@Update');
        Route::get('/{id}/destroy', 'Usercontroller@Destroy');
    });


    //Job
    Route::get('job_create', 'JobController@Create');
    Route::prefix('job')->group(function () {
        Route::get('/', 'JobController@Show');
        Route::post('/store', 'JobController@Store');
        Route::get('/{id}/edit', 'JobController@Edit');
        Route::post('/{id}/update', 'JobController@Update');
        Route::get('/{id}/destroy', 'Jobcontroller@Destroy');
    });


    //Department
    Route::get('department_create', 'DepartmentController@Create');
    Route::prefix('department')->group(function () {
        Route::get('/', 'DepartmentController@Show');
        Route::post('/store', 'DepartmentController@Store');
        Route::get('/{id}/edit', 'DepartmentController@Edit');
        Route::post('/{id}/update', 'DepartmentController@Update');
        Route::get('/{id}/destroy', 'Departmentcontroller@Destroy');
    });


    //Region
    Route::get('region_create', 'RegionController@Create');
    Route::prefix('region')->group(function () {
        Route::get('/', 'RegionController@Show');
        Route::post('/store', 'RegionController@Store');
        Route::get('/{id}/edit', 'RegionController@Edit');
        Route::post('/{id}/update', 'RegionController@Update');
        Route::get('/{id}/destroy', 'Regioncontroller@Destroy');
    });


    //Countries
    Route::get('country_create', 'CountryController@Create');
    Route::prefix('country')->group(function () {
        Route::get('/', 'CountryController@Show');
        Route::post('/store', 'CountryController@Store');
        Route::get('/{id}/edit', 'CountryController@Edit');
        Route::post('/{id}/update', 'CountryController@Update');
        Route::get('/{id}/destroy', 'Countrycontroller@Destroy');
    });


    //Location
    Route::get('location_create', 'LocationController@Create');
    Route::prefix('location')->group(function () {
        Route::get('/', 'LocationController@Show');
        Route::post('/store', 'LocationController@Store');
        Route::get('/{id}/edit', 'LocationController@Edit');
        Route::post('/{id}/update', 'LocationController@Update');
        Route::get('/{id}/destroy', 'Locationcontroller@Destroy');
    });


    //Department
    Route::get('employee_create', 'EmployeeController@Create');
    Route::prefix('employee')->group(function () {
        Route::get('/', 'EmployeeController@Show');
        Route::post('/store', 'EmployeeController@Store');
        Route::get('/{id}/edit', 'EmployeeController@Edit');
        Route::post('/{id}/update', 'EmployeeController@Update');
        Route::get('/{id}/destroy', 'Employeecontroller@Destroy');
    });

    Route::prefix('task')->group(function () {
        Route::get('/', 'TaskController@Show');
        Route::post('/store', 'TaskController@Store');
        Route::get('/{id}/edit', 'TaskController@Edit');
        Route::post('/{id}/update', 'TaskController@Update');
        Route::post('/destroy', 'TaskController@Destroy');
    });
});