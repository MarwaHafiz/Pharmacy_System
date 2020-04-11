<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/doctors', 'DoctorController@index')->name('doctors.index');

// Route::get('/orders','OrderMedicineController@index')->name('orders.index');
// Route::get('/orders/create','OrderMedicineController@create')->name('orders.create');

// Route::post('/orders', 'OrderMedicineController@store')->name('orders.store');

// Route::get('/orders/{order}', 'OrderMedicineController@show')->name('orders.show');

// Route::get('/orders/{order}/edit', 'OrderMedicineController@edit')->name('orders.edit');

// Route::patch('/orders/{order}', 'OrderMedicineController@update')->name('orders.update');

// Route::delete('/orders/{order}', 'OrderMedicineController@destroy')->name('orders.destroy');

// Route::get('/doctors', 'DoctorController@index')->name('doctors.index');
// Route::get('/doctors/create', 'DoctorController@create')->name('doctors.create');
// Route::post('/doctors', 'DoctorController@store')->name('doctors.store');
// Route::get('/doctors/{doctor}', 'DoctorController@show')->name('doctors.show');
// Route::get('/doctors/{doctor}/edit', 'DoctorController@edit')->name('doctors.edit');
// Route::put('/doctors/{doctor}', 'DoctorController@update')->name('doctors.update');
// Route::delete('/doctors/{doctor}/delete', 'DoctorController@destroy')->name('doctors.destroy');



// Route::get('/pharmacies', 'PharmacyController@index')->name('pharmacies.index');
// Route::get('/pharmacies/create','PharmacyController@create')->name('pharmacies.create');
// Route::get('/pharmacies/{pharmacy}', 'PharmacyController@show')->name('pharmacies.show');
// Route::post('/pharmacies','PharmacyController@store')->name('pharmacies.store');
// Route::delete('/pharmaciess/{pharmacy}','PharmacyController@destroy')->name('pharmacies.destroy');
// Route::get('/pharmacies/{pharmacy}/edit','PharmacyController@edit')->name('pharmacies.edit');
// Route::put('/pharmacies/{pharmacy}','PharmacyController@update')->name('pharmacies.update');

//Route::get('/posts/','PostController@index')->name('posts.destroy');


//medicines routes
// Route::get('/medicines', 'MedicineController@index')->name('medicines.index');
// Route::get('/medicines/create','MedicineController@create')->name('medicines.create');
// Route::post('/medicines','MedicineController@store')->name('medicines.store');
// Route::get('/medicines/{medicine}', 'MedicineController@show')->name('medicines.show');
// Route::get('/medicines/{medicine}/edit','MedicineController@edit')->name('medicines.edit');
// Route::put('/medicines/{medicine}','MedicineController@update')->name('medicines.update');
// Route::delete('/medicines/{medicine}/delete','MedicineController@destroy')->name('medicines.destroy');


//areas routes
// Route::get('/areas', 'AreaController@index')->name('areas.index');
// Route::get('/areas/create','AreaController@create')->name('areas.create');
// Route::post('/areas','AreaController@store')->name('areas.store');
// Route::get('/areas/{area}', 'AreaController@show')->name('areas.show');
// Route::get('/areas/{area}/edit','AreaController@edit')->name('areas.edit');
// Route::put('/areas/{area}','AreaController@update')->name('areas.update');
// Route::delete('/areas/{area}/delete','AreaController@destroy')->name('areas.destroy');

// //user routes
// Route::get('Users', 'UserController@index')->name('users.index');
// Route::get('Users/create', 'UserController@create')->name('users.create');
// Route::post('Users/store', 'UserController@store')->name('users.store');
// Route::get('Users/{user}', 'UserController@show')->name('users.show');
// Route::DELETE('Users/{user}/delete', 'UserController@destroy')->name('users.destroy');
// Route::get('Users/{user}/edit', 'UserController@edit')->name('users.edit');
// Route::put('Users/{user}', 'UserController@update')->name('users.update');

// //user addresses routes
// Route::get('Addresses', 'UserAddressesController@index')->name('addresses.index');
// Route::get('Addresses/create', 'UserAddressesController@create')->name('addresses.create');
// Route::post('Addresses/store', 'UserAddressesController@store')->name('addresses.store');
// Route::get('Addresses/{address}', 'UserAddressesController@show')->name('addresses.show');
// Route::DELETE('Addresses/{address}/delete', 'UserAddressesController@destroy')->name('addresses.destroy');
// Route::get('Addresses/{address}/edit', 'UserAddressesController@edit')->name('addresses.edit');
// Route::put('Addresses/{address}', 'UserAddressesController@update')->name('addresses.update');




// login as admin
Auth::routes();
    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Auth::routes();
    Route::get('/login/doctor', 'Auth\LoginController@showDoctorLoginForm')->name('doctor.login');
    Route::post('/login/doctor', 'Auth\LoginController@doctorLogin');


Route::view('/home', 'home')->middleware('auth');




Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('/admin', function () {
               return view('admin');
         });
         Route::prefix('admin')->group(function () {

            //medicines routes
            Route::get('/medicines', 'MedicineController@index')->name('medicines.index');
            Route::get('/medicines/create','MedicineController@create')->name('medicines.create');
            Route::post('/medicines','MedicineController@store')->name('medicines.store');
            Route::get('/medicines/{medicine}', 'MedicineController@show')->name('medicines.show');
            Route::get('/medicines/{medicine}/edit','MedicineController@edit')->name('medicines.edit');
            Route::put('/medicines/{medicine}','MedicineController@update')->name('medicines.update');
            Route::delete('/medicines/{medicine}/delete','MedicineController@destroy')->name('medicines.destroy');
    
            //orders routes
            Route::get('/orders','OrderMedicineController@index')->name('orders.index');
Route::get('/orders/create','OrderMedicineController@create')->name('orders.create');

Route::post('/orders', 'OrderMedicineController@store')->name('orders.store');

Route::get('/orders/{order}', 'OrderMedicineController@show')->name('orders.show');

Route::get('/orders/{order}/edit', 'OrderMedicineController@edit')->name('orders.edit');

Route::patch('/orders/{order}', 'OrderMedicineController@update')->name('orders.update');

Route::delete('/orders/{order}/delete', 'OrderMedicineController@destroy')->name('orders.destroy');
Route::get('/Revenue','RevenueController@index')->name('Revenue.index');

//doctors
Route::get('/doctors', 'DoctorController@index')->name('doctors.index');
Route::get('/doctors/create', 'DoctorController@create')->name('doctors.create');
Route::post('/doctors', 'DoctorController@store')->name('doctors.store');
Route::get('/doctors/{doctor}', 'DoctorController@show')->name('doctors.show');
Route::get('/doctors/{doctor}/edit', 'DoctorController@edit')->name('doctors.edit');
Route::put('/doctors/{doctor}', 'DoctorController@update')->name('doctors.update');
Route::delete('/doctors/{doctor}/delete', 'DoctorController@destroy')->name('doctors.destroy');
Route::get('/doctors/{doctor}/ban', 'DoctorController@ban')->name('doctors.ban');
Route::get('/doctors/{doctor}/unban', 'DoctorController@unban')->name('doctors.unban');


//pharmacies routes
Route::get('/pharmacies', 'PharmacyController@index')->name('pharmacies.index');
Route::get('/pharmacies/create','PharmacyController@create')->name('pharmacies.create');
Route::get('/pharmacies/{pharmacy}', 'PharmacyController@show')->name('pharmacies.show');
Route::post('/pharmacies','PharmacyController@store')->name('pharmacies.store');
Route::delete('/pharmaciess/{pharmacy}','PharmacyController@destroy')->name('pharmacies.destroy');
Route::get('/pharmacies/{pharmacy}/edit','PharmacyController@edit')->name('pharmacies.edit');
Route::put('/pharmacies/{pharmacy}','PharmacyController@update')->name('pharmacies.update');


//areas routes
Route::get('/areas', 'AreaController@index')->name('areas.index');
Route::get('/areas/create','AreaController@create')->name('areas.create');
Route::post('/areas','AreaController@store')->name('areas.store');
Route::get('/areas/{area}', 'AreaController@show')->name('areas.show');
Route::get('/areas/{area}/edit','AreaController@edit')->name('areas.edit');
Route::put('/areas/{area}','AreaController@update')->name('areas.update');
Route::delete('/areas/{area}/delete','AreaController@destroy')->name('areas.destroy');

//user routes
Route::get('Users', 'UserController@index')->name('users.index');
Route::get('Users/create', 'UserController@create')->name('users.create');
Route::post('Users/store', 'UserController@store')->name('users.store');
Route::get('Users/{user}', 'UserController@show')->name('users.show');
Route::DELETE('Users/{user}/delete', 'UserController@destroy')->name('users.destroy');
Route::get('Users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('Users/{user}', 'UserController@update')->name('users.update');

//user addresses routes
Route::get('Addresses', 'UserAddressesController@index')->name('addresses.index');
Route::get('Addresses/create', 'UserAddressesController@create')->name('addresses.create');
Route::post('Addresses/store', 'UserAddressesController@store')->name('addresses.store');
Route::get('Addresses/{address}', 'UserAddressesController@show')->name('addresses.show');
Route::DELETE('Addresses/{address}/delete', 'UserAddressesController@destroy')->name('addresses.destroy');
Route::get('Addresses/{address}/edit', 'UserAddressesController@edit')->name('addresses.edit');
Route::put('Addresses/{address}', 'UserAddressesController@update')->name('addresses.update');

        });
});

Route::group(['middleware' => ['auth.doctor']], function () {
    // login protected routes.
    Route::get('/doctororders', 'DoctorUserController@index')->name('doctororders.index');
    Route::view('/doctor', 'doctor');
});