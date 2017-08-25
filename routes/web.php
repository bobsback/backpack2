<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

Route::get('/', function () {
    return redirect('home');
});

Route::get('/roles', function () {

   
   $admin = Role::create(['name' => 'admin']); 
$user = Role::create(['name' => 'user']);

User::first()->roles()->attach(1);
return User::with('roles')->first();

});
Route::get('home','home@index' );

Route::get('/login', function () {

       return view('login');
});
Route::get('/register', function () {

       return view('register');
});
Route::get('yourads','FileEntryController@edit' );

Route::get('user', 'FileEntryController@index');

Route::get('fileentry/get/{filename}', [
	'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::post('add',[ 
        'as' => 'addentry', 'uses' => 'FileEntryController@add']);

Route::get('image-upload','ImageController@imageUpload');
Route::post('image-upload','ImageController@imageUploadPost');

Route::get('/Order','home@Order');
Route::get('/Sort','AjaxController@index');
Route::get('/Click','AjaxController@Click');
Route::get('/about', function () {

       return view('about');
});
Route::patch('/yourads','FileEntryController@update');

Route::group(['middleware' => 'web', 'prefix' => config('backpack.base.route_prefix'), 'namespace' => 'Backpack\Base\app\Http\Controllers'],
 function () {
    Route::auth();
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('dashboard', 'AdminController@dashboard');
    Route::get('/', 'AdminController@redirect');
});