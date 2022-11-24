<?php

namespace Gregorio\Service;

use Gregorio\Config\Database;
use Gregorio\Model\Pulsa;
use Gregorio\Repository\Repository;
use PHPUnit\Framework\TestCase;

class TambahPulsaTest extends TestCase

{

    private Service $userService;

    public function setUp(): void
    {
        $koneksi = Database::getConnection();
        $Repository = new Repository($koneksi);
        $this->userService = new Service($Repository);
    }

    public function testRegisterSuccess()
    {
        $request = new Pulsa();
        $request->pulsa = 90000;
        $request->id_kamar= "K01";
        $request->receiptID= "131011717053";


        $response = $this->userService->tambah_pulsa($request);

        self::assertEquals($request->pulsa, $response->pulsa->pulsa);
        self::assertEquals($request->id_kamar, $response->pulsa->id_kamar);
        self::assertEquals($request->receiptID, $response->pulsa->receiptID);


    }


}