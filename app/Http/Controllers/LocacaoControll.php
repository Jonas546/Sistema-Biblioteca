<?php

namespace Biblioteca\Http\Controllers;

use Illuminate\Http\Request;
use Biblioteca\Locacao;
use DB;

class LocacaoControll extends Controller
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
        return view('gerenciar_locacao');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function list(){

        $table = DB::table('locacaos')
        ->join('livros', 'livros.id', '=', 'locacaos.id_livro')
        ->join('clientes', 'clientes.id', '=', 'locacaos.id_cliente')
        ->select('locacaos.*', 'clientes.id as cd_cliente', 'clientes.nome', 'livros.id as cod_livro', 'livros.titulo')
        ->where('locacaos.status', '=', 'Aberto')
        ->get();

        return $table;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $cod_cli, $cod_livro, $qtde)
    {

        $table = Locacao::getInstance();

        return $table->alugarLivro($request, $cod_cli, $cod_livro, $qtde);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $table = DB::table('locacaos')
        ->join('livros', 'livros.id', '=', 'locacaos.id_livro')
        ->join('clientes', 'clientes.id', '=', 'locacaos.id_cliente')
        ->select('locacaos.*', 'clientes.id as cd_cliente', 'clientes.nome', 'livros.id as cod_livro', 'livros.titulo', 'livros.autor', 'livros.editora', 'livros.localizacao', 'livros.qtde')
        ->where('locacaos.id', '=', $id)
        ->where('locacaos.status', '=', 'Aberto')
        ->get();

        return $table;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        
        $table = Locacao::getInstance();

        return $table->prorrogar($request, $id);

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

    public function fim(Request $request, $id, $cod, $qtde, $cli)
    {

        $table = Locacao::getInstance();

        return $table->encerrar($request, $id, $cod, $qtde, $cli);

    }
}
