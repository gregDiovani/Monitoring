<?php

namespace Gregorio\Controller;

use Gregorio\App\View;
use Gregorio\Config\Database;
use Gregorio\Exception\ValidateExecption;
use Gregorio\Model\Pulsa;
use Gregorio\Repository\Repository;
use Gregorio\Service\Service;

session_start();

class TambahController
{

    private Service $service;


    public function __construct()
    {
        $koneksi=Database::getConnection();
        $repository= new Repository($koneksi);
        $this->service = new Service($repository);

    }

    public function index(): void

    {

        $model = [
            "title" => "Tambah PulsaRequest",
            "data" => [
                "transaksi" => Service::show_Distinct()
            ]

        ];

        View::render('Home/tambah', $model);
    }

    public function tambahPulsa()

    {

    $requestpulsa = new Pulsa();
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
                    "transaksi" => Service::show_Distinct(),
                    "error" => $exception->getMessage()
                ]
            ]);


        }



    }

}