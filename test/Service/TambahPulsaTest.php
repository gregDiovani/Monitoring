<?php

namespace Gregorio\Service;

use Gregorio\Config\Database;
use Gregorio\Entity\Pulsa;
use Gregorio\Model\PulsaRequest;
use Gregorio\Repository\TransaksiRepository;
use PHPUnit\Framework\TestCase;

class TambahPulsaTest extends TestCase

{

    private ServiceTransaksi $userService;

    public function setUp(): void
    {
        $koneksi = Database::getConnection();
        $Repository = new TransaksiRepository($koneksi);
        $this->userService = new ServiceTransaksi($Repository);
    }

    public function testRegisterSuccess()
    {
        $request = new PulsaRequest();
        $request->pulsa = 90000;
        $request->id_kamar= "K01";
        $request->receiptID= "131011717053";


        $response = $this->userService->tambah_pulsa($request);

        self::assertEquals($request->pulsa, $response->pulsa->pulsa);
        self::assertEquals($request->id_kamar, $response->pulsa->id_kamar);
        self::assertEquals($request->receiptID, $response->pulsa->receiptID);


    }


}