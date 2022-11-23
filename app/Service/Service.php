<?php

namespace Gregorio\Service;

use Gregorio\Model\Transaksi;
use Gregorio\Repository\Repository;

class Service
{

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


    public static function show_notifikasi():array
    {
        $sql = "select amount_rp,date_format(time, '%a %b %e %Y %T') AS time from t_bayar ORDER BY kd DESC limit 2";
        $datas= Repository::fetchAll($sql);
        return $datas;
    }




}