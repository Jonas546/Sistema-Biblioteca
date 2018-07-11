<?php

namespace Biblioteca;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    static private $instance;

    static public function getInstance(){

		if(!isset(self::$instance)){
			self::$instance = new Cliente(); 
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

}
