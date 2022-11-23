<?php

namespace Gregorio\Controller;

use Gregorio\App\View;

class HistoryController
{
    function index(): void
    {

        $model = [
            "title" => "Smart Prepaid Dashboard"
            ];

        View::render('Home/history', $model);
    }
}