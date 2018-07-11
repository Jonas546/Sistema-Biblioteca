<?php

namespace Biblioteca\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Biblioteca\Gastos;
use DB;

class FinanceiroControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth.role');
    }

    public function index()
    {

    }

    public function gastos(){

        if(Auth::check()){
            $permission = Auth::user()->permission;
        }

        return view('gerenciar_despesas', compact('permission'));

    }

    public function receitas(){

        return view('gerenciar_receitas');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_gastos(Request $request)
    {
        
        $data = json_decode($request->getContent(), true);

        $table = Gastos::getInstance();

        $table->insertGetId($data);

        return response()->json(['message' => 'ok']);

    }

    public function show_despesas($i, $f)
    {
        
        $table = Gastos::whereBetween('data_registro', array($i, $f))
        ->get();

        return $table;

    }

    public function show_receitas($i, $f)
    {
        
        $table = DB::table('locacaos')
        ->join('clientes', 'clientes.id' ,'=', 'locacaos.id_cliente')
        ->join('livros', 'livros.id', '=', 'locacaos.id_livro')
        ->select('locacaos.*', 'clientes.nome', 'livros.titulo')
        ->where('locacaos.status' ,'=', 'Fechado')
        ->whereBetween('locacaos.devolucao',  array($i, $f))
        ->get();

        return $table;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_dp($id)
    {
        $table = Gastos::find($id);

        $table->delete();

        return response()->json(['message' => 'ok']);

    }

    public function get_dp_rel(Request $request){

        $data_inicio = $request->data_inicio1;
        $data_fim = $request->data_fim1;

        $table = Gastos::getInstance();

        return $table->relatorio_despesas($data_inicio, $data_fim);

    }

    public function get_rc_rel(Request $request){

        $data_inicio = $request->data_inicio1;
        $data_fim = $request->data_fim1;

        $table = Gastos::getInstance();

        return $table->relatorio_receitas($data_inicio, $data_fim);

    }

}
