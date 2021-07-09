<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('docentes', 'Docente\DocenteController')->except(['edit']);
    Route::resource('alumnos', 'Alumno\AlumnoController');

    Route::post('ajax/docentes', 'Docente\DocenteController@getDocentes')->name('ajax.docentes.index');
});
