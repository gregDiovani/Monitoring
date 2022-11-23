<?php

namespace Gregorio\Controller;

use Gregorio\App\View;
use Gregorio\Service\Service;

class HistoryController
{
    function index(): void
    {

        $model = [
            "title" => "Smart Prepaid Dashboard",
            "data" => [
                "data-transaksi" => Service::show_transaksi(),
                "chart" => Service::show_dataChartTransaksi()
                ]
            ];

        View::render('Home/history', $model);
    }
}