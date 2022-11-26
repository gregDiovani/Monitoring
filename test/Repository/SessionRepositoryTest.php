<?php

namespace Gregorio\Repository;

use Gregorio\Config\Database;
use Gregorio\Entity\Session;
use Gregorio\Entity\User;
use PHPUnit\Framework\TestCase;

class SessionRepositoryTest extends TestCase
{
    private SessionRepository $sessionRepository;
    private UserRepository $userRepository;

    public function setUp(): void
    {

        $this->sessionRepository = new SessionRepository(Database::getConnection());
        $this->sessionRepository->deleteAll();
    }

    public function testSaveSuccess()
    {
        $session = new Session();
        $session->id = uniqid();
        $session->userId = "Gregorio";

        $this->sessionRepository->save($session);

        $result = $this->sessionRepository->findById($session->id);


        self::assertEquals($session->id, $result->id);
        self::assertEquals($session->userId, $result->userId);
    }

    public function testDeleteById(){

        $session = new Session();
        $session->id = uniqid();
        $session->userId = "Gregorio";

        $this->sessionRepository->save($session);

        $result= $this->sessionRepository->findById($session->id);

        self::assertEquals($session->id,$result->id);
        self::assertEquals($session->userId,$result->userId);

        $result= $this->sessionRepository->deleteById($result->id);
        self::assertNull($result);




    }



    public function testFindByIdNotFound()
    {
        $result = $this->sessionRepository->findById('notfound');
        self::assertNull($result);
    }










}