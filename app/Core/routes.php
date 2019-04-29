<?php

use App\Core\Route;

Route::get('/', 'MainController@index');

Route::run();