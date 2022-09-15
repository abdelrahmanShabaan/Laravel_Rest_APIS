<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


         //Routes / APIS here must be api authenticated
Route::group(['middleware' => ['api','checkPassword','changeLanguage'], 'namespace'=> 'API'],function (){

    Route::post('get-main-categories', 'CategoriesController@index');
    Route::post('get-category-byId', 'CategoriesController@getCategoryById');
    Route::post('change-category-status', 'CategoriesController@changeStatus');

    //for login without CheckAdminToken
    Route::group(['prefix' => 'admin', 'namespace'=> 'Admin'],function () {
        Route::post('login', 'AuthController@login');


        Route::post('logout', 'AuthController@logout')->middleware('auth.guard:admin-api');



    });

    Route::group(['prefix' => 'user', 'namespace'=> 'User'],function (){
        Route::post('login','AuthController@Login');
        });

    });

    Route::group(['prefix' => 'user' ,'middleware' => 'auth.guard:user-api'],function (){
        Route::post('profile',function(){
            return  'only authentaction can reach me';
        });




});

Route::group(['middleware' => ['api','checkPassword','changeLanguage','checkAdminToken:admin-api'], 'namespace'=> 'API'],function () {
    Route::get('offers', 'CategoriesController@index');

});
