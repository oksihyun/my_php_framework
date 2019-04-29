<?php

namespace App\Controller;

use App\Core\DB;
use App\Core\Controller;

class MainController extends Controller
{
	public function index()
	{
		require_once VIEW . '/index.php';
	}
}