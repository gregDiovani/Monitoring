<?php

namespace Gregorio\Controller;

use Gregorio\App\View;
use Gregorio\Config\Database;
use Gregorio\Repository\SessionRepository;
use Gregorio\Repository\UserRepository;
use Gregorio\Service\ServiceTransaksi;
use Gregorio\Service\SessionService;

class HomeController
{

    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepository($connection);
        $userRepository = new UserRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }


    function index(): void

    {
        $user = $this->sessionService->current();




        if ($user == null) {
            View::render('Home/index', [
                "title" => "Dashboard",
                "data" => [
                    "pendapatan" => ServiceTransaksi::show_pendapatan()[0],
                    "jumlahPengsian" => ServiceTransaksi::show_pendapatan()[1],
                    "jumlahkamar" => ServiceTransaksi::show_jumlahKamar(),
                    "chart" => ServiceTransaksi::show_dataChart('K01'),
                    "notifikasi"=> ServiceTransaksi::show_notifikasi()

                ]

            ]);

    }
        else {

            View::render('Home/index', [
                "title" => "Dashboard",
                "user" => [
                    "name" => $user->username
                ],
                 "data" => [
                "pendapatan" => ServiceTransaksi::show_pendapatan()[0],
                "jumlahPengsian" => ServiceTransaksi::show_pendapatan()[1],
                "jumlahkamar" => ServiceTransaksi::show_jumlahKamar(),
                "chart" => ServiceTransaksi::show_dataChart('K01'),
                "notifikasi"=> ServiceTransaksi::show_notifikasi()

            ]
            ]);
        }
    }



}