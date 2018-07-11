<?php

namespace Biblioteca\Http\Controllers;

use Illuminate\Http\Request;
use Biblioteca\Livro;
use DB;

class LivroControll extends Controller
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
        return view('gerenciar_livro');
    }

    public function list(){

        $table = DB::table('livros')->get();

        return $table;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $table = Livro::getInstance();

        $table->insertGetId($data);

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
        $table = Livro::getInstance();

        return $table->where('titulo', 'like', $id.'%')->get();
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
        $data = json_decode($request->getContent(), true);

        $table = Livro::where('id', '=', $id);

        $table->update($data);

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
        $table = Livro::find($id);

        $table->delete();

        return response()->json(['message' => 'ok']);
    }
}
