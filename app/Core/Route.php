<?php

namespace App\Core;

class Route
{
	private static $GET = [];
	private static $POST = [];

	public static function get($url, $action)
	{
		self::addRoute('GET', $url, $action);
	}

	public static function post($url, $action)
	{
		self::addRoute('POST', $url, $action);
	}

	private static function addRoute($method, $url, $action)
	{
		$data = self::parseRoute($url, $action);
		self::${$method}[] = $data;
	}

	private static function parseRoute($url, $action)
	{
		$arr = explode('@', $action);
		return [
			'url' => $url,
			'controller' => 'App\\Controller\\' . $arr[0],
			'action' => $arr[1]
		];
	}

	public static function run()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$url = self::getURL();
		$data = self::${$method};
		foreach ($data as $item) {
			if ($item['url'] == $url) {
				$item['controller'] = new $item['controller']();
				return $item['controller']->{$item['action']}();
			}
		}
	}

	private static function getURL()
	{
		$url = '/';
		if (isset($_GET['url'])) {
			$url = '/' . rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
		}
		return $url;
	}
}