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

Auth::routes();

Route::get('/', function () {
    return view('home');
})->middleware(['auth.role']);

//Rotas para Cliente

Route::post('/cl_store', 'ClienteControll@store');

Route::get('/Gerenciar_clientes', 'ClienteControll@index');

Route::get('/cl_list', 'ClienteControll@list');

Route::get('/cl_show/{id}', 'ClienteControll@show');

Route::post('/cl_update/{id}', 'ClienteControll@update');

//Rota para Livros

Route::get('/Gerenciar_livros', 'LivroControll@index');

Route::get('/lv_list', 'LivroControll@list');

Route::get('/lv_show/{id}', 'LivroControll@show');

Route::post('/lv_store', 'LivroControll@store');

Route::post('/lv_update/{id}', 'LivroControll@update');

Route::get('/lv_delete/{id}', 'LivroControll@destroy');

//Rota para Locações

Route::post('/lc_store/{cod_cli}/{cod_livro}/{qtde}', 'LocacaoControll@store');

Route::get('/lc_list', 'LocacaoControll@list');

Route::get('/Gerenciar_locacoes', 'LocacaoControll@index');

Route::get('/lc_show/{id}', 'LocacaoControll@show');

Route::post('/lc_update/{id}', 'LocacaoControll@update');

Route::post('/lc_fim/{id}/{cod}/{qtde}/{cli}', 'LocacaoControll@fim');

//Rotas para Histórico

Route::get('/hc_list/{id}', 'HistoricoControll@show');

//Rotas para Financeiro

Route::get('/Gerenciar_Despesas', 'FinanceiroControll@gastos');

Route::get('/Gerenciar_Receitas', 'FinanceiroControll@receitas');

Route::post('/dp_store', 'FinanceiroControll@store_gastos');

Route::get('/fcd_show/{i}/{f}', 'FinanceiroControll@show_despesas');

Route::get('/fcr_show/{i}/{f}', 'FinanceiroControll@show_receitas');

Route::get('/fcd_delete/{id}', 'FinanceiroControll@destroy_dp');

Route::post('/rel_gastos', 'FinanceiroControll@get_dp_rel');

Route::post('/rel_receitas', 'FinanceiroControll@get_rc_rel');

//Rotas para Usuário

Route::get('/novo_usuario', 'Auth\RegisterController@view');

Route::get('/change', 'Auth\RegisterController@change');

Route::post('/us_store', 'Auth\RegisterController@store');

Route::post('/us_update/{id}', 'Auth\RegisterController@update');

//Rotas de Login

Route::get('/login', 'Auth\LoginController@login');

Route::post('/auth', 'Auth\LoginController@authenticate');

Route::get('/logout', 'Auth\LoginController@logout');