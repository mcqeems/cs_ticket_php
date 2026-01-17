<?php
namespace App\Models;

use App\Configs\Database;

class UserModel {
	private $collection;

	public function __construct(){
		$client = Database::getConnection();
		$this->collection = $client->selectDatabase('cs_ticket')->selectCollection('users');
	}

	public function getData(){
		return $this->collection->find()->toArray();
	}
}

?>