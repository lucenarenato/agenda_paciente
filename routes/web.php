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
/*Route::get('/', function () {
    return view('welcome');
});*/


Auth::routes();

Route::get('/', 'IndexController@index');
Route::get('/entrar', 'IndexController@login');
Route::get('/cadastrar', 'IndexController@register');

Route::get('/home', 'HomeController@principal');

Route::resource('/pacientes', 'PacientesController');

Route::resource('/medicos', 'MedicosController');

Route::resource('/agendamentos', 'AgendamentosController');

//Route::resource('/agendamentos/agenda', 'AgendaController');--teste


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

