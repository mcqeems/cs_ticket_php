<?php
namespace App\Configs;

use MongoDB\Client;

class Database
{
	private static $client = null;
	private static $database = null;

	public static function getConnection()
	{
		if (self::$client === null) {
			self::$client = new Client("mongodb://localhost:27017");
		}
		return self::$client;
	}

	public static function getDatabase($dbName = 'cs_ticket')
	{
		if (self::$database === null) {
			$client = self::getConnection();
			self::$database = $client->selectDatabase($dbName);
		}
		return self::$database;
	}
}
?>