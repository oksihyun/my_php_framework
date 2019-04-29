<?php

// define
define('RELOAD', $_SERVER['REQUEST_URI']);
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('APP', ROOT . '/app');
define('CORE', APP . '/Core');
define('VIEW', APP . '/View');

// config
session_start();
date_default_timezone_set('Asia/Seoul');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// require
require_once CORE . '/autoload.php';
require_once CORE . '/lib.php';
require_once CORE . '/routes.php';