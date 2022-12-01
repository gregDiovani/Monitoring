<?php

namespace Gregorio\Controller;

use Gregorio\App\View;
use Gregorio\Service\ServiceTransaksi;

class HistoryController
{
    function index(): void
    {

        $model = [
            "title" => "Smart Prepaid Dashboard",
            "data" => [
                "data-transaksi" => ServiceTransaksi::show_transaksi(),
                "chart" => ServiceTransaksi::show_dataChartTransaksi()
                ]
            ];

        View::render('Home/history', $model);
    }
}