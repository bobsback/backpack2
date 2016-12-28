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
    return view('welcome');
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
Route::get('user', 'FileEntryController@index');

Route::get('fileentry/get/{filename}', [
	'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::post('add',[ 
        'as' => 'addentry', 'uses' => 'FileEntryController@add']);

Route::get('image-upload','ImageController@imageUpload');
Route::post('image-upload','ImageController@imageUploadPost');

Route::get('/Order','home@Order');
Route::get('/Sort','AjaxController@index');
Route::post('/Click','AjaxController@Click');