<?php

namespace Gregorio\Controller;

use Gregorio\App\View;

class HomeController
{

    function index(): void
    {
        $model = [
            "title" => "Smart Prepaid Dashboard"
        ];

        View::render('Home/index', $model);
    }


}