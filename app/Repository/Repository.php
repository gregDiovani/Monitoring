<?php

namespace Gregorio\Repository;

use Gregorio\Config\Database;
use Gregorio\Model\Pulsa;

class Repository
{

    private \PDO $koneksi;

    public function __construct(\PDO $koneksi)
    {
        $this->koneksi = $koneksi;
    }


    public function save(Pulsa $pulsa):Pulsa
    {
        $statement = $this->koneksi->prepare("INSERT INTO t_bayar(id_kamar, amount_rp,receipt_id)
        VALUES (?, ?, ?) ");
        $statement->execute([
            $pulsa->id_kamar,
            $pulsa->pulsa,
            $pulsa->receiptID,
        ]);

        return $pulsa;

    }

    public static function fetchAll(string $sql):array
    {
            $statement = Database::getConnection()->query($sql);
            $statement->execute();
            $data =  $statement->fetchAll(\PDO::FETCH_ASSOC); //line 86
            return $data;

    }



}