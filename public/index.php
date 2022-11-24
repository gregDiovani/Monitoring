<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Gregorio\App\Router;
use Gregorio\Controller\HomeController;
use Gregorio\Controller\HistoryController;
use Gregorio\Controller\TambahController;



Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/history', HistoryController::class, 'index');
Router::add('GET', '/tambah', TambahController::class, 'index');
Router::add('POST', '/tambah/pulsa', TambahController::class, 'tambahpulsa');


Router::run();