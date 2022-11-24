<?php

namespace Gregorio\Service;

use Gregorio\Config\Database;
use Gregorio\Exception\ValidateExecption;
use Gregorio\Model\Pulsa;
use Gregorio\Model\PulsaResponse;
use Gregorio\Model\Transaksi;
use Gregorio\Repository\Repository;


class Service
{

    private Repository $repository;

    /**
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }


    public static function show_pendapatan():array

    {
       $sql = "SELECT * FROM t_bayar";
       $datas= Repository::fetchAll($sql);

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
        $datas= Repository::fetchAll($sql);

        foreach( $datas as  $data) {
            $data = intval($data['totalAktif']);
        }


        return $data;

    }

    public static function show_dataChart(string $id_kamar):array
    {
        $sql = "select id_kamar, date_format(tgl, '%M'),TRUNCATE(sum(amount_rp)/1500,2 ) AS totalPakai from t_pakai where id_kamar='$id_kamar' group by date_format(tgl, '%M') DESC";
        $datas= Repository::fetchAll($sql);

        return $datas;
    }

    public static function show_dataChartTransaksi():array
    {
        $sql = "select sum(amount_rp) as totalRp,time from t_bayar group by date_format(time, '%M') DESC ";
        $datas= Repository::fetchAll($sql);

        return $datas;
    }

    public static function show_notifikasi():array
    {
        $sql = "select amount_rp,date_format(time, '%a %b %e %Y %T') AS time from t_bayar ORDER BY kd DESC limit 2";
        $datas= Repository::fetchAll($sql);
        return $datas;
    }

    public static function show_transaksi():array

    {
        $sql = "SELECT * FROM t_bayar";
        $datas= Repository::fetchAll($sql);
        return $datas;
    }

    public static function show_Distinct():array

    {
        $sql = "SELECT DISTINCT id_kamar FROM t_bayar;";
        $datas= Repository::fetchAll($sql);
        return $datas;
    }



    public function tambah_pulsa(Pulsa $pulsarequest): PulsaResponse
    {
        $this->validateInsertPulsa($pulsarequest);

        try{
            Database::beginTransaction();
            $pulsa = new Pulsa();
            $pulsa->id_kamar = $pulsarequest->id_kamar;
            $pulsa->pulsa = $pulsarequest->pulsa;
            $pulsa->receiptID = $pulsarequest->receiptID;
            $this->repository->save($pulsa);

            $response = new PulsaResponse();
            $response->pulsa = $pulsa;
            Database::commitTransaction();

        return $response;
        }catch (\Exception $exception){
            Database::rollbackTransaction();
            throw $exception;

        }


    }

    private function validateInsertPulsa(Pulsa $pulsarequest)
    {
        if($pulsarequest->id_kamar == null || $pulsarequest->pulsa == null || $pulsarequest->receiptID == null ||  trim($pulsarequest->id_kamar ) == ""  || trim($pulsarequest->pulsa ) == "" || trim($pulsarequest->receiptID ) == "" )
        {
            throw new ValidateExecption("id_kamar, pulsa, receipt_Id tidak boleh kosong");
        }



    }



}






