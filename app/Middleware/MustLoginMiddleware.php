<?php

namespace Gregorio\Middleware;

use Gregorio\App\View;
use Gregorio\Config\Database;
use Gregorio\Repository\UserRepository;
use Gregorio\Repository\SessionRepository;
use Gregorio\Service\SessionService;

class MustLoginMiddleware implements Middleware
{
    private SessionService $sessionService;


    public function __construct()
    {
        $sessionRepository = new SessionRepository(Database::getConnection());
        $userRepository = new UserRepository(Database::getConnection());
        $this->sessionService = new SessionService($sessionRepository,$userRepository);
    }


    function before(): void
    {
        $user = $this->sessionService->current();
        if ($user == null) {
            View::redirect('user/login');
        }
    }
}