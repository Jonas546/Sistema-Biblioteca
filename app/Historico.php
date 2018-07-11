<?php

namespace Biblioteca;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    	
    static private $instance;

	static public function getInstance(){
		if(!isset(self::$instance)){
			self::$instance = new Historico(); 
		}

		return self::$instance;
	}

}
