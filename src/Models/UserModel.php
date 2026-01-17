<?php
namespace App\Models;

use App\Configs\Database;

class UserModel
{
	private $collection;

	public function __construct()
	{
		$db = Database::getDatabase();
		$this->collection = $db->users;
	}

	public function getData()
	{
		return $this->collection->find()->toArray();
	}
}

?>