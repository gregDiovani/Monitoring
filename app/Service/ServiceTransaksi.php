<?php

namespace Gregorio\Service;

use Gregorio\Config\Database;
use Gregorio\Entity\Pulsa;
use Gregorio\Exception\ValidateExecption;
use Gregorio\Model\PulsaRequest;
use Gregorio\Model\PulsaResponse;
use Gregorio\Model\Transaksi;
use Gregorio\Repository\TransaksiRepository;


class ServiceTransaksi
{

    private TransaksiRepository $repository;


    public function __construct(TransaksiRepository $repository)
    {
        $this->repository = $repository;
    }


    public static function show_pendapatan():array

    {
       $sql = "SELECT * FROM t_bayar";
       $datas= TransaksiRepository::fetchAll($sql);

        $sum = 0;

        foreach ( $datas as $data){

            $sum+= $data['amount_rp'];
        }

        $jumlah_kamar = count($datas);
        $transaksi = array($sum,$jumlah_kamar);

        return $transaksi;


    }

    public static function show_jumlahKamar():int

    {
        $sql = "SELECT COUNT(DISTINCT id_kamar) as totalAktif FROM t_pakai";
        $datas= TransaksiRepository::fetchAll($sql);

        foreach( $datas as  $data) {
            $data = intval($data['totalAktif']);
        }


        return $data;

    }

    public static function show_dataChart(string $id_kamar):array
    {
        $sql = "select MONTH(tgl) as Bulan, MONTHNAME(tgl) as BulanName, TRUNCATE(sum(amount_rp)/1500,2) as totalPakai from t_pakai where id_kamar='Kamar01' GROUP BY (Bulan) ORDER BY(Bulan)";
        $datas= TransaksiRepository::fetchAll($sql);

        return $datas;
    }


    public static function show_dataChartTransaksi():array
    {
        $sql = "select sum(amount_rp) as totalRp, MONTH(time) as bulan, MONTHNAME(time) as BulanName from t_bayar  GROUP BY (bulan) ORDER BY(bulan)";
        $datas= TransaksiRepository::fetchAll($sql);

        return $datas;
    }

    public static function show_notifikasi():array
    {
        $sql = "select amount_rp,date_format(time, '%a %b %e %Y %T') AS time from t_bayar ORDER BY kd DESC limit 4";
        $datas= TransaksiRepository::fetchAll($sql);
        return $datas;
    }

    public static function show_transaksi():array

    {
        $sql = "SELECT * FROM t_bayar";
        $datas= TransaksiRepository::fetchAll($sql);
        return $datas;
    }

    public static function show_Distinct():array

    {
        $sql = "SELECT DISTINCT id_kamar FROM t_bayar;";
        $datas= TransaksiRepository::fetchAll($sql);
        return $datas;
    }



    public function tambah_pulsa(PulsaRequest $pulsarequest): PulsaResponse
    {
        $this->validateInsertPulsa($pulsarequest);

        try{
            Database::beginTransaction();

            /// Save to Database
            $pulsa = new Pulsa();
            $pulsa->id_kamar = $pulsarequest->id_kamar;
            $pulsa->pulsa = $pulsarequest->pulsa;
            $pulsa->receiptID = $pulsarequest->receiptID;
            $this->repository->save($pulsa);


            /// Mengembalikan response
            $response = new PulsaResponse();
            $response->pulsa = $pulsa;
            Database::commitTransaction();

        return $response;


        }catch (\Exception $exception){
            Database::rollbackTransaction();
            throw $exception;

        }


    }

    private function validateInsertPulsa(PulsaRequest $pulsarequest)
    {
        if($pulsarequest->id_kamar == null || $pulsarequest->pulsa == null || $pulsarequest->receiptID == null ||  trim($pulsarequest->id_kamar ) == ""  || trim($pulsarequest->pulsa ) == "" || trim ($pulsarequest->receiptID ) == "" )
        {
            throw new ValidateExecption("id_kamar, pulsa, receipt_Id tidak boleh kosong");
        }



    }



}






