<?php

namespace Gregorio\Repository;

use Gregorio\Config\Database;

class Repository
{

    public static function fetchAll(string $sql):array
    {
            $statement = Database::getConnection()->query($sql);
            $statement->execute();
            $data =  $statement->fetchAll(\PDO::FETCH_ASSOC); //line 86
            return $data;

    }



}