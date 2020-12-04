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

Route::post("/subscribe", "App\Http\Controllers\SubscribeController@index")->name("product.subscribe");

Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])
    ->get('/admin', "App\Http\Controllers\Admin\DashboardController@index")
    ->name("admin.dashboard");

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('schools')->name('schools/')->group(static function () {
            Route::get('/',                                             'SchoolsController@index')->name('index');
            Route::get('/create',                                       'SchoolsController@create')->name('create');
            Route::post('/',                                            'SchoolsController@store')->name('store');
            Route::get('/{school}/edit',                                'SchoolsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SchoolsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{school}',                                    'SchoolsController@update')->name('update');
            Route::delete('/{school}',                                  'SchoolsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('devices')->name('devices/')->group(static function () {
            Route::get('/',                                             'DevicesController@index')->name('index');
            Route::get('/create',                                       'DevicesController@create')->name('create');
            Route::post('/',                                            'DevicesController@store')->name('store');
            Route::get('/{device}/edit',                                'DevicesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DevicesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{device}',                                    'DevicesController@update')->name('update');
            Route::delete('/{device}',                                  'DevicesController@destroy')->name('destroy');
            Route::get('/export',                                       'DevicesController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('students')->name('students/')->group(static function () {
            Route::get('/',                                             'StudentsController@index')->name('index');
            Route::get('/create',                                       'StudentsController@create')->name('create');
            Route::post('/',                                            'StudentsController@store')->name('store');
            Route::get('/{student}/edit',                               'StudentsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StudentsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{student}',                                   'StudentsController@update')->name('update');
            Route::delete('/{student}',                                 'StudentsController@destroy')->name('destroy');
            Route::get('/export',                                       'StudentsController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('attendancies')->name('attendancies/')->group(static function () {
            Route::get('/',                                             'AttendanciesController@index')->name('index');
            Route::get('/create',                                       'AttendanciesController@create')->name('create');
            Route::post('/',                                            'AttendanciesController@store')->name('store');
            Route::get('/{attendancy}/edit',                            'AttendanciesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AttendanciesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{attendancy}',                                'AttendanciesController@update')->name('update');
            Route::delete('/{attendancy}',                              'AttendanciesController@destroy')->name('destroy');
            Route::get('/export',                                       'AttendanciesController@export')->name('export');
        });
    });
});
