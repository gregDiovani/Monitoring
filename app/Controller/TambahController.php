<?php

namespace Gregorio\Controller;

use Gregorio\App\View;
use Gregorio\Config\Database;
use Gregorio\Exception\ValidateExecption;
use Gregorio\Model\PulsaRequest;
use Gregorio\Repository\RepositoryTransaksi;
use Gregorio\Service\ServiceMysql;

session_start();

class TambahController
{

    private ServiceMysql $service;


    public function __construct()
    {
        $koneksi=Database::getConnection();
        $repository= new RepositoryTransaksi($koneksi);
        $this->service = new ServiceMysql($repository);

    }

    public function index(): void

    {

        $model = [
            "title" => "Tambah PulsaRequest",
            "data" => [
                "transaksi" => ServiceMysql::show_Distinct()
            ]

        ];

        View::render('Home/tambah', $model);
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
                    "transaksi" => ServiceMysql::show_Distinct(),
                    "error" => $exception->getMessage()
                ]
            ]);


        }



    }

}