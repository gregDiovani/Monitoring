<?php

namespace Gregorio\Controller;

use Gregorio\App\View;
use Gregorio\Service\ServiceMysql;

class HistoryController
{
    function index(): void
    {

        $model = [
            "title" => "Smart Prepaid Dashboard",
            "data" => [
                "data-transaksi" => ServiceMysql::show_transaksi(),
                "chart" => ServiceMysql::show_dataChartTransaksi()
                ]
            ];

        View::render('Home/history', $model);
    }
}