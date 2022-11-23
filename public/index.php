<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Gregorio\App\Router;
use Gregorio\Controller\HomeController;
use Gregorio\Controller\HistoryController;



Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/history', HistoryController::class, 'index');


Router::run();