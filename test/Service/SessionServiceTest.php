<?php

namespace Gregorio\Service;

use Gregorio\Config\Database;
use Gregorio\Entity\Session;
use Gregorio\Entity\User;
use Gregorio\Repository\SessionRepository;
use Gregorio\Repository\UserRepository;
use PHPUnit\Framework\TestCase;


function setcookie(string $name,string $value){

    echo "$name: $value";
}

class SessionServiceTest extends TestCase
{

    private SessionService $sessionService;
    private SessionRepository $sessionRepository;
    private UserRepository $userRepository;

    public static string $COOKIE_NAME = "S-Power";


   protected function setUp(): void
   {
       $this->sessionRepository = new SessionRepository(Database::getConnection());
       $this->userRepository = new UserRepository(Database::getConnection());
       $this->sessionService = new SessionService($this->sessionRepository,$this->userRepository);



   }

    public function testCreate()
    {
        $session = $this->sessionService->create("gregorio");

        $this->expectOutputRegex("[S-Power: $session->id]");

        $result = $this->sessionRepository->findById($session->id);

        self::assertEquals("gregorio", $result->userId);
    }

    public function testDestroy()
    {
        $session = new Session();
        $session->id = uniqid();
        $session->userId = "gregorio";

        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

        $this->sessionService->destroy();

        $this->expectOutputRegex("[S-Power:]");

        $result = $this->sessionRepository->findById($session->id);
        self::assertNull($result);
    }

    public function testCurrent()
    {
        $session = new Session();
        $session->id = uniqid();
        $session->userId = "gregorio";

        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

        $user = $this->sessionService->current();

        self::assertEquals($session->userId, $user->username);
    }
}