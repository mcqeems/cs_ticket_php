<?php
namespace App\Configs;

use MongoDB\Client;

class Database {
	public static function getConnection(){
		return new Client("mongodb://localhost:27017");
	}
}
?> 