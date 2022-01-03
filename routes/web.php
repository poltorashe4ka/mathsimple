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
Route::get('/', 'MathController@index');
Route::get('/make', 'MathController@make')->name('make');
Route::post('/print', 'MathController@print')->name('print');
Route::post('/send_msg', 'MathController@send_msg')->name('send_msg');
Route::get('/tasks', 'MathController@tasks')->name('tasks');
Route::get('/comp', 'MathController@comp')->name('comp');
Route::get('/mental', 'MathController@mental')->name('mental');
Route::get('/mental_start', 'MathController@mental_start')->name('mental_start');
Route::get('/table', 'MathController@table')->name('table');
Route::get('/mera', 'MathController@mera')->name('mera');
Route::get('/clock', 'MathController@clock')->name('clock');
Route::get('/drob', 'MathController@drob')->name('drob');
Route::get('/rim', 'MathController@rim')->name('rim');



Route::get('/review', 'MainController@review')->name('review');
Route::get('/shop', 'MainController@shop')->name('shop');
Route::get('/contact', 'MainController@contact')->name('contact');
Route::get('/teoriya', 'MainController@teoriya')->name('teoriya');
Route::get('/number', 'MainController@number');
Route::get('/operacii', 'MainController@operacii');
Route::get('/figure', 'MainController@figure');
Route::get('/test_student', 'MainController@test_student')->name('test_student');
Route::get('/book_dounload', 'MathController@book_dounload')->name('book_dounload');

//Account routes
//Route::group(['prefix' => 'auth'], function () {
    Route::get('/home', 'AccountController@home');
Route::get('/pay', 'AccountController@pay');
Route::get('/tarifs', 'AccountController@tarifs');
Route::post('/pay_query', 'AccountController@pay_query');
Route::get('/success', 'AccountController@success');
Route::post('/pay_checke', 'AccountController@pay_checke');
//});
Route::get('/signin', 'AccountController@signin')->name('signin');
Route::get('/start', 'AccountController@start')->name('start');

// Маршруты аутентификации...
//Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@authenticate');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('auth/update', 'Auth\AuthController@update');

// Маршруты регистрации...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Admin routes
Route::group(['prefix' => 'admin'], function () {

    Route::get('login', 'Admin\AuthController@showLoginForm');
    Route::post('login', 'Admin\AuthController@login');

    Route::group(['middleware' => ['auth', 'acl']], function () {

        Route::get('/', 'Admin\IndexController@index')->name('admin');
        Route::get('requests', 'Admin\LeadsController@index')->name('admin/requests');

        Route::get('logout', 'Admin\AuthController@logout')->name('logout');

        Route::get('leads', 'Admin\LeadsController@index')->name('admin/leads');
        Route::get('leads/show/{id}', 'Admin\LeadsController@show');

        Route::get('settings', 'Admin\SettingsController@index')->name('admin/settings');
        Route::get('settings/create', 'Admin\SettingsController@create');
        Route::post('settings/store', 'Admin\SettingsController@store');
        Route::get('settings/edit/{id}', 'Admin\SettingsController@edit');
        Route::post('settings/update/{id}', 'Admin\SettingsController@update');
        Route::post('settings/destroy/{id}', 'Admin\SettingsController@destroy');

        Route::get('used_brands', 'Admin\UsedBrandsController@index')->name('admin/used_brands');
        Route::get('used_brands/edit/{id}', 'Admin\UsedBrandsController@edit');
        Route::post('used_brands/update/{id}', 'Admin\UsedBrandsController@update');
        Route::get('used_brands/sync', 'Admin\UsedBrandsController@sync');

        Route::get('feedbacks', 'Admin\FeedbacksController@index')->name('admin/feedbacks');
        Route::get('feedbacks/create', 'Admin\FeedbacksController@create')->name('admin/feedbacks_create');
        Route::post('feedbacks/store', 'Admin\FeedbacksController@store')->name('admin/feedbacks_store');
        Route::get('feedbacks/edit/{id}', 'Admin\FeedbacksController@edit')->name('admin/feedbacks_edit');
        Route::post('feedbacks/update/{id}', 'Admin\FeedbacksController@update')->name('admin/feedbacks_update');
        Route::post('feedbacks/destroy/{id}', 'Admin\FeedbacksController@destroy')->name('admin/feedbacks_destroy');

        Route::get('tests', 'Admin\TestsController@index')->name('admin/tests');
        Route::get('tests/create', 'Admin\TestsController@create')->name('admin/tests_create');
        Route::post('tests/store', 'Admin\TestsController@store')->name('admin/tests_store');
        Route::get('tests/edit/{id}', 'Admin\TestsController@edit')->name('admin/tests_edit');
        Route::post('tests/update/{id}', 'Admin\TestsController@update')->name('admin/tests_update');
        Route::post('tests/destroy/{id}', 'Admin\TestsController@destroy')->name('admin/tests_destroy');

        Route::get('test_result', 'Admin\TestsController@test_result')->name('admin/test_result');
        Route::get('test_result/create', 'Admin\TestsController@test_result_create')->name('admin/test_result_create');
        Route::post('test_result/store', 'Admin\TestsController@test_result_store')->name('admin/test_result_store');
        Route::get('test_result/edit/{id}', 'Admin\TestsController@test_result_edit')->name('admin/test_result_edit');
        Route::post('test_result/update/{id}', 'Admin\TestsController@test_result_update')->name('admin/test_result_update');
        Route::post('test_result/destroy/{id}', 'Admin\TestsController@test_result_destroy')->name('admin/test_result_destroy');

        Route::post('sort', '\Rutorika\Sortable\SortableController@sort');

        Route::get('seos', 'Admin\SeosController@index')->name('admin/seos');
        Route::get('seos/create', 'Admin\SeosController@create');
        Route::post('seos/store', 'Admin\SeosController@store');
        Route::get('seos/edit/{id}', 'Admin\SeosController@edit');
        Route::post('seos/update/{id}', 'Admin\SeosController@update');
        Route::post('seos/destroy/{id}', 'Admin\SeosController@destroy');

        Route::get('complains', 'Admin\ComplainsController@index')->name('admin/complains');
        Route::get('complains/show/{id}', 'Admin\ComplainsController@show');

    });

});

Route::fallback(function () {
    return view('errors.404_desktop');
});
