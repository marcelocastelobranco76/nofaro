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
Route::get('/', 'ListaPessoasController@index' , function () {
    return view('welcome');
});



/**Rotas para a parte de backend **/
Auth::routes(['register' => false]); /** Impede que outra pessoa faça registro no sistema. **/

Route::get('/home', 'HomeController@index')->name('home');

/** Rotas para listar,cadastrar, atualizar e deletar pessoas - Métodos HTTP **/
Route::any('/pessoas','PessoaController@index');

Route::get('pessoas/cadastrar', 'PessoaController@create');

Route::post('pessoas', 'PessoaController@store');

Route::get('pessoas/{id}/editar', 'PessoaController@edit');

Route::patch('/pessoas/{id}/{email}', 'PessoaController@update');

Route::delete('pessoas/{id}', 'PessoaController@destroy');
