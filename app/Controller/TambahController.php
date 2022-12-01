<?php

namespace Gregorio\Controller;

use Gregorio\App\View;
use Gregorio\Config\Database;
use Gregorio\Exception\ValidateExecption;
use Gregorio\Model\PulsaRequest;
use Gregorio\Repository\SessionRepository;
use Gregorio\Repository\TransaksiRepository;
use Gregorio\Repository\UserRepository;
use Gregorio\Service\ServiceTransaksi;
use Gregorio\Service\SessionService;


session_start();

class TambahController
{


    private SessionService $sessionService;
    private ServiceTransaksi $service;


    public function __construct()
    {
        $koneksi=Database::getConnection();
        $transaksiRepository = new TransaksiRepository($koneksi);
        $sessionRepository = new SessionRepository($koneksi);
        $userRepository = new UserRepository($koneksi);

        $this->service = new ServiceTransaksi($transaksiRepository);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);

    }

    public function index(): void

    {

        $user = $this->sessionService->current();


        if ($user == null) {

            $model = [
                "title" => "Tambah Pulsa",
                "data" => [
                    "transaksi" => ServiceTransaksi::show_Distinct()
                ]

            ];

            View::render('Home/tambah', $model);



        }else{

            View::render('Home/tambah',[
                "title" => "Tambah Pulsa",
                "user" => [
                    "name" => $user->username
                ],
                "data" => [
                    "transaksi" => ServiceTransaksi::show_Distinct()
                ]

            ]);


        }




    }

    public function tambahPulsa()

    {

    $requestpulsa = new PulsaRequest();
    $requestpulsa->id_kamar = $_POST['id'];
    $requestpulsa->pulsa = $_POST['pulsa'];
    $requestpulsa->receiptID = $_POST['receipt_id'];

        try {
            $this->service->tambah_pulsa($requestpulsa);
            $_SESSION['success'] = "Penambahan Data Berhasil";

            View::redirect('/tambah');
        }catch (ValidateExecption $exception){
            View::render('Home/tambah', [
                "title" => "Tambah PulsaRequest",
                "data" => [
                    "transaksi" => ServiceTransaksi::show_Distinct(),
                    "error" => $exception->getMessage()
                ]
            ]);


        }



    }

}