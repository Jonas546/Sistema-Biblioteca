<?php

namespace Biblioteca\Http\Controllers;

use Illuminate\Http\Request;
use Biblioteca\Cliente;
use DB;

class ClienteControll extends Controller
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
        return view('gerenciar_cliente');
    }

    public function list(){

        $table = DB::table('clientes')->get();

        return $table;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('registrar_cliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Cliente::getInstance();

        $table->nome = $request->nome;
        $table->rg = $request->rg;
        $table->cpf = $request->cpf;
        $table->tel = $request->tel;
        $table->email = $request->email;
        $table->nasc = $table->date_converter($request->nasc);
        $table->endereco = $request->end;
        $table->cep = $request->cep;
        $table->cidade = $request->cidade;
        $table->uf = $request->uf;

        $table->save();

        return response()->json(['message' => 'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Cliente::getInstance();

        return $table->where('nome', 'like', $id.'%')->get();
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
        
        $data = json_decode($request->getContent(), true);

        $aux = Cliente::getInstance();

        //foreach ($key as $data) {

        $table = Cliente::where('id', '=', $id);

        $table->update($data);

       //}

        return response()->json(['message' => 'ok']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
