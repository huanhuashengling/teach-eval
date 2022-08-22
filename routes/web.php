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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::group([
    'namespace'  => 'App\Http\Controllers\Operator',
    'prefix'     => 'operator',
    'middleware' => ['auth'],
], function () {
    Route::resource('task', 'TaskController');
    Route::resource('task_log', 'TaskLogController');
    Route::resource('report', 'ReportController');
    Route::get('report-export', 'ReportController@export')->name('operator.report.export');
});
