<?php

namespace Gregorio\Controller;

use Gregorio\App\View;
use Gregorio\Service\ServiceMysql;

class HomeController
{

    function index(): void

    {

        $model = [
            "title" => "Smart Prepaid Dashboard",
            "data" => [
                "pendapatan" => ServiceMysql::show_pendapatan()[0],
                "jumlahPengsian" => ServiceMysql::show_pendapatan()[1],
                "jumlahkamar" => ServiceMysql::show_jumlahKamar(),
                "chart" => ServiceMysql::show_dataChart('K01'),
                "notifikasi"=> ServiceMysql::show_notifikasi()

            ]
        ];


        View::render('Home/index', $model);
    }

    function hello(): void
    {

    }


}