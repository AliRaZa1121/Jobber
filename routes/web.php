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

// Auth Routes =======================================================
Auth::routes();
Route::get('/login', 'MyAuthController@login')->name('login');
Route::get('/register', 'MyAuthController@register')->name('register');
Route::post('/register', 'MyAuthController@store')->name('register');
// Auth Routes =======================================================

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', 'PagesController@index')->name('dashboard');
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/add', 'UserController@create')->name('users.create');
    Route::get('users/{identity_token}/edit', 'UserController@edit')->name('users.edit');
    Route::get('users/{user}/detail', 'UserController@show')->name('users.detail');
    Route::post('users/store', 'UserController@store')->name('users.store');
    Route::post('users/{user}/update', 'UserController@update')->name('users.update');
    Route::get('users/{user}/delete', 'UserController@destroy')->name('users.delete');
    Route::get('users', 'UserController@index')->name('users');

    Route::get('packages', 'PackageController@index')->name('packages');
    Route::get('packages/add', 'PackageController@create')->name('packages.create');
    Route::get('packages/{package}/edit', 'PackageController@edit')->name('packages.edit');
    Route::get('packages/{package}/detail', 'PackageController@show')->name('packages.detail');
    Route::post('packages/store', 'PackageController@store')->name('packages.store');
    Route::post('packages/{package}/update', 'PackageController@update')->name('packages.update');
    Route::get('packages/{package}/delete', 'PackageController@destroy')->name('packages.delete');


    Route::get('categories', 'CategoryController@index')->name('categories');
    Route::get('categories/add', 'CategoryController@create')->name('categories.create');
    Route::get('categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::get('categories/{category}/detail', 'CategoryController@show')->name('categories.detail');
    Route::post('categories/store', 'CategoryController@store')->name('categories.store');
    Route::post('categories/{category}/update', 'CategoryController@update')->name('categories.update');
    Route::get('categories/{category}/delete', 'CategoryController@destroy')->name('categories.delete');


    Route::get('companies', 'CompanyController@index')->name('companies');
    Route::get('user/companies', 'CompanyController@indexUsers')->name('companies.user');
    Route::get('companies/{identity_token}/add', 'CompanyController@create')->name('companies.create');
    Route::get('companies/{company}/edit', 'CompanyController@edit')->name('companies.edit')->middleware('crud.guard');
    Route::get('companies/{company}/detail', 'CompanyController@show')->name('companies.detail');
    Route::post('companies/store', 'CompanyController@store')->name('companies.store');
    Route::post('companies/{company}/update', 'CompanyController@update')->name('companies.update');
    Route::get('companies/{company}/markVerified', 'CompanyController@markVerified')->name('companies.mark.verified');
    Route::get('companies/{company}/delete', 'CompanyController@destroy')->name('companies.delete');

    Route::get('settings', 'SettingController@index')->name('settings');
    Route::get('settings/add', 'SettingController@create')->name('settings.create');
    Route::get('settings/{setting}/edit', 'SettingController@edit')->name('settings.edit');
    Route::get('settings/{setting}/detail', 'SettingController@show')->name('settings.detail');
    Route::post('settings/store', 'SettingController@store')->name('settings.store');
    Route::post('settings/{setting}/update', 'SettingController@update')->name('settings.update');
    Route::get('settings/{setting}/delete', 'SettingController@destroy')->name('settings.delete');
});


