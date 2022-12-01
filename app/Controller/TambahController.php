<?php

namespace Gregorio\Controller;

use Gregorio\App\View;
use Gregorio\Config\Database;
use Gregorio\Exception\ValidateExecption;
use Gregorio\Model\PulsaRequest;
use Gregorio\Repository\TransaksiRepository;
use Gregorio\Service\ServiceTransaksi;

session_start();

class TambahController
{

    private ServiceTransaksi $service;


    public function __construct()
    {
        $koneksi=Database::getConnection();
        $repository= new TransaksiRepository($koneksi);
        $this->service = new ServiceTransaksi($repository);

    }

    public function index(): void

    {

        $model = [
            "title" => "Tambah PulsaRequest",
            "data" => [
                "transaksi" => ServiceTransaksi::show_Distinct()
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
                    "transaksi" => ServiceTransaksi::show_Distinct(),
                    "error" => $exception->getMessage()
                ]
            ]);


        }



    }

}