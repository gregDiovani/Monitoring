<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Gregorio\App\Router;
use Gregorio\Controller\HomeController;



Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/transaksi', HomeController::class, 'hello');


Router::run();