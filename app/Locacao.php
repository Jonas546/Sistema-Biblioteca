<?php

namespace Biblioteca;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Biblioteca\Livro;
use Biblioteca\Historico;

class Locacao extends Model
{
    
	static private $instance;

	static public function getInstance(){
		if(!isset(self::$instance)){
			self::$instance = new Locacao(); 
		}

		return self::$instance;
	}

	public function alugarLivro(Request $request, $id_cli, $id_livro, $qtde){

		$table = self::getInstance();

		$data = json_decode($request->getContent(), true);

		$table->insertGetId($data);

		$table_1 = Livro::find($id_livro);

		$table_1->qtde = $qtde - 1;

		$table_1->update();

		$table_2 = self::where('id_cliente', '=', $id_cli)
		->where('id_livro', '=', $id_livro)
		->where('status', '=', 'Aberto')
		->get();

		foreach ($table_2 as $key1) {
			
			$aux1 = $key1->id;

			return response()->json(['message' => 'ok', 'codigo' => $aux1]);

		}

	}

	public function prorrogar(Request $request, $id){

        $data = json_decode($request->getContent(), true);

        $table = self::where('id', '=', $id);

        $table->update($data);

        return response()->json(['message' => 'ok']);

	}

	public function encerrar(Request $request, $id, $cod, $qtde, $cli){

		$data = json_decode($request->getContent(), true);

        $table = self::where('id', '=', $id);

        $table->update($data);


        $table1 = Livro::find($cod);

        $table1->qtde = $qtde + 1;

        $table1->update();


        $table2 = Historico::getInstance();

        $table2->id_cliente = $cli;

        $table2->id_livro = $cod;

        $table2->id_locacao = $id;

        $table2->save();
        

        return response()->json(['message' => 'ok']); 

	}

	public function date_converter($_date = null) {
        $format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
        if ($_date != null && preg_match($format, $_date, $partes)) {
        return $partes[3].'-'.$partes[1].'-'.$partes[2];
        }
        return false;
    }

}
