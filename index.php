<?php

require_once __DIR__ . '/vendor/autoload.php';

use Gregorio\App\Router;
use Gregorio\Controller\HomeController;
use Gregorio\Controller\HistoryController;
use Gregorio\Controller\TambahController;
use Gregorio\Controller\LoginController;
use Gregorio\Middleware\MustLoginMiddleware;



Router::add('GET', '/', HomeController::class, 'index');


Router::add('GET', '/history', HistoryController::class, 'index',[MustLoginMiddleware::class]);
Router::add('GET', '/tambah', TambahController::class, 'index',[MustLoginMiddleware::class]);
Router::add('POST', '/tambah/pulsa', TambahController::class, 'tambahpulsa');



Router::add('GET', '/user/logout', LoginController::class, 'logout',[]);

Router::add('GET', '/user/login', LoginController::class, 'login');
Router::add('POST', '/user/postLogin', LoginController::class, 'postLogin');


Router::run();