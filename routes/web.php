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


Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'bindings'], function() {
/*
 * Routes Details Plans
 */
    Route::get('plans/{plan}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::get('plans/{plan}/details', 'DetailPlanController@index')->name('details.plan.index');
    Route::get('plans/{plan}/details/{detail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::put('plans/{plan}/details/{detail}', 'DetailPlanController@update')->name('details.plan.update');
    Route::delete('plans/{plan}/details/{detail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
    Route::get('plans/{plan}/details/{detail}', 'DetailPlanController@show')->name('details.plan.show');
    Route::post('plans/{plan}/details', 'DetailPlanController@store')->name('details.plan.store');
/*
 * Routes Plans
 */
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::get('plans', 'PlanController@index')->name('plans.index');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::get('plans/{id}/edit', 'PlanController@edit')->name('plans.edit');
    Route::put('plans/{id}', 'PlanController@update')->name('plans.update');
    Route::get('plans/{id}', 'PlanController@show')->name('plans.show');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::delete('admin/plans/{id}', 'PlanController@destroy')->name('plans.destroy');

    Route::get('/', 'PlanController@index')->name('admin.index');
});

Route::get('/', function () {
    return view('welcome');
});

