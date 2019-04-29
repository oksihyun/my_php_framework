<?php

namespace App\Core;

class DB
{
	private static function connection()
	{
		$pdo = new \PDO('mysql:host=localhost;charset=utf8;dbname=??????', 'root', '');
		$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
		return $pdo;
	}

	public static function execute($sql, $arr=null)
	{
		$stmt = self::connection()->prepare($sql);
		$stmt->execute($arr);
		return $stmt;
	}

	public static function fetch($sql, $arr=null)
	{
		return self::execute($sql, $arr)->fetch();
	}

	public static function fetchAll($sql, $arr=null)
	{
		return self::execute($sql, $arr)->fetchAll();
	}

	public static function rowCount($sql, $arr=null)
	{
		return self::execute($sql, $arr)->rowCount();
	}
}