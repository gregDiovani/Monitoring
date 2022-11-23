<?php

namespace Gregorio\Controller;

use Gregorio\App\View;
use Gregorio\Service\Service;

class HomeController
{

    function index(): void

    {

        $model = [
            "title" => "Smart Prepaid Dashboard",
            "data" => [
                "pendapatan" => Service::show_pendapatan()[0],
                "jumlahPengsian" => Service::show_pendapatan()[1],
                "jumlahkamar" => Service::show_jumlahKamar(),
                "chart" => Service::show_dataChart('K01'),
                "notifikasi"=> Service::show_notifikasi()

            ]
        ];


        View::render('Home/index', $model);
    }

    function hello(): void
    {

    }


}