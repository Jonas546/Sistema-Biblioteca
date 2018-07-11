<?php

namespace Biblioteca;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    
	static private $instance;

	static public function getInstance(){
		if(!isset(self::$instance)){
			self::$instance = new Livro(); 
		}

		return self::$instance;
	}

}
