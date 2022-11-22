<?php

namespace Gregorio\Controller;

use Gregorio\App\View;

class HomeController
{

    function index(): void
    {
        $model = [
            "title" => "Gregorio Belajar MVC",
            "content" => "Selamat datang di webiste MVC gregorio"
        ];

        View::render('Home/index', $model);
    }


}