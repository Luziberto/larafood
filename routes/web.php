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
     * Routes Permissions Profiles
     */
    Route::any('Profiles/{profile}/plans/search', 'PlanProfileController@search')->name('profiles.plans.search');
    Route::any('Profiles/{profile}/plans/create/search', 'PlanProfileController@searchPlansAvailable')->name('profiles.plans.available.search');
    Route::get('Profiles/{profile}/plans/create', 'PlanProfileController@plansAvailable')->name('profiles.plans.available');
    Route::get('Profiles/{profile}/plans', 'PlanProfileController@plans')->name('profiles.plans');
    Route::delete('Profiles/{profile}/plans/{permission}', 'PlanProfileController@detachPlansProfile')->name('profiles.plans.detach');
    Route::post('Profiles/{profile}/plans', 'PlanProfileController@attachPlansProfile')->name('profiles.plans.attach');

/*
 * Routes Permissions Profiles
 */
    Route::any('Profiles/{profile}/permissions/search', 'PermissionProfileController@search')->name('profiles.permissions.search');
    Route::any('Profiles/{profile}/permissions/create/search', 'PermissionProfileController@searchPermissionsAvailable')->name('profiles.permissions.available.search');
    Route::get('Profiles/{profile}/permissions/create', 'PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::get('Profiles/{profile}/permissions', 'PermissionProfileController@permissions')->name('profiles.permissions');
    Route::delete('Profiles/{profile}/permissions/{permission}', 'PermissionProfileController@detachPermissionsProfile')->name('profiles.permissions.detach');
    Route::post('Profiles/{profile}/permissions', 'PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');

/*
* Routes Permissions
*/
    Route::any('permissions/search', 'PermissionController@search')->name('permissions.search');
    Route::get('permissions', 'PermissionController@index')->name('permissions.index');
    Route::get('permissions/create', 'PermissionController@create')->name('permissions.create');
    Route::get('permissions/{permission}/edit', 'PermissionController@edit')->name('permissions.edit');
    Route::put('permissions/{permission}', 'PermissionController@update')->name('permissions.update');
    Route::get('permissions/{permission}', 'PermissionController@show')->name('permissions.show');
    Route::post('permissions', 'PermissionController@store')->name('permissions.store');
    Route::delete('permissions/{permission}', 'PermissionController@destroy')->name('permissions.destroy');

 /*
 * Routes Profiles
 */
    Route::any('profiles/search', 'ProfileController@search')->name('profiles.search');
    Route::get('profiles', 'ProfileController@index')->name('profiles.index');
    Route::get('profiles/create', 'ProfileController@create')->name('profiles.create');
    Route::get('profiles/{profile}/edit', 'ProfileController@edit')->name('profiles.edit');
    Route::put('profiles/{profile}', 'ProfileController@update')->name('profiles.update');
    Route::get('profiles/{profile}', 'ProfileController@show')->name('profiles.show');
    Route::post('profiles', 'ProfileController@store')->name('profiles.store');
    Route::delete('profiles/{profile}', 'ProfileController@destroy')->name('profiles.destroy');

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
    Route::delete('plans/{id}', 'PlanController@destroy')->name('plans.destroy');

    Route::get('/', 'PlanController@index')->name('admin.index');
});

Route::get('/', function () {
    return view('welcome');
});

