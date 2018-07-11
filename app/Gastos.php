<?php

namespace Biblioteca;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Biblioteca\Locacao;
use DB;

class Gastos extends Model
{
    
	static private $instance;

    static public function getInstance(){

		if(!isset(self::$instance)){
			self::$instance = new Gastos(); 
		}

		return self::$instance;
	}

	public function date_converter($_date = null) {
        $format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
        if ($_date != null && preg_match($format, $_date, $partes)) {
        return $partes[3].'-'.$partes[1].'-'.$partes[2];
        }
        return false;
    }

    public function relatorio_despesas($data_inicio, $data_fim)
    {

        $t = self::getInstance();

        $table = self::whereBetween('data_registro', array($t->date_converter($data_inicio), $t->date_converter($data_fim)))
        ->get();

        $sum = self::whereBetween('data_registro', array($t->date_converter($data_inicio), $t->date_converter($data_fim)))
        ->sum('valor');

 
    	return \PDF::loadView('relatorio_despesas', compact('table', 'data_inicio', 'data_fim', 'sum'))
                // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                ->stream("Relatorio_Despesas.pdf");
    }

    public function relatorio_receitas($data_inicio, $data_fim)
    {

        $t = Locacao::getInstance();

        $table = DB::table('locacaos')
        ->join('clientes', 'clientes.id' ,'=', 'locacaos.id_cliente')
        ->join('livros', 'livros.id', '=', 'locacaos.id_livro')
        ->select('locacaos.*', 'clientes.nome', 'livros.titulo')
        ->where('locacaos.status' ,'=', 'Fechado')
        ->whereBetween('locacaos.devolucao', array($t->date_converter($data_inicio), $t->date_converter($data_fim)))
        ->get();

        $sum = Locacao::whereBetween('devolucao', array($t->date_converter($data_inicio), $t->date_converter($data_fim)))
        ->sum('valor');

 
        return \PDF::loadView('relatorio_receitas', compact('table', 'data_inicio', 'data_fim', 'sum'))
                // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                ->stream("Relatorio_Receitas.pdf");
    } 

}
