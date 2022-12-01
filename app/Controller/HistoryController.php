<?php

namespace Gregorio\Controller;

use Gregorio\App\View;
use Gregorio\Config\Database;
use Gregorio\Repository\SessionRepository;
use Gregorio\Repository\UserRepository;
use Gregorio\Service\ServiceTransaksi;
use Gregorio\Service\SessionService;

class HistoryController
{

    private ServiceTransaksi $service;
    private SessionService $sessionService;
    
    public function __construct()
    {
        $koneksi = Database::getConnection();
        $userRepository = new UserRepository($koneksi);
        $sessionRepository = new SessionRepository($koneksi);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);



    }

    function index(): void
    {
        $user = $this->sessionService->current();

        $model = [
            "title" => "History Dashboard",
            "data" => [
                "data-transaksi" => ServiceTransaksi::show_transaksi(),
                "chart" => ServiceTransaksi::show_dataChartTransaksi()
            ]
        ];


        if ($user == null) {



            View::render('Home/history', $model);

        }else{



            View::render('Home/history',[
                "title" => "Smart Prepaid Dashboard",
                "user" => [
                    "name" => $user->username
                ],
                "data" => [
                    "data-transaksi" => ServiceTransaksi::show_transaksi(),
                    "chart" => ServiceTransaksi::show_dataChartTransaksi()
                ]
            ]);


        }


    }
}