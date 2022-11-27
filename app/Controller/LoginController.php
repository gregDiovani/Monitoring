<?php

namespace Gregorio\Controller;

use Gregorio\App\View;
use Gregorio\Config\Database;
use Gregorio\Exception\ValidateExecption;
use Gregorio\Model\LoginRequest;
use Gregorio\Repository\SessionRepository;
use Gregorio\Repository\UserRepository;
use Gregorio\Service\ServiceLogin;
use Gregorio\Service\SessionService;
use phpDocumentor\Reflection\Types\Void_;


class LoginController
{
    private SessionService $sessionService;

    private ServiceLogin $userService;


    public function __construct()
    {
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $this->userService = new ServiceLogin($userRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository,$userRepository);

    }

    public function logout(): void
    {
        $this->sessionService->destroy();
        View::redirect("/");

    }



    function postLogin(): void

    {
        $request = new LoginRequest();
        $request->username = $_POST['username'];
        $request->password = $_POST['password'];


        try {
            $response = $this->userService->login($request);
            $this->sessionService->create($response->user->username);

            View::redirect('/');
        }catch (ValidateExecption $exception){
            View::render('User/login',
            ["title" => 'Login',
              "error" => $exception->getMessage()
            ]);



        }


    }

    public function login()
    {
        View::render('User/Login', [
            "title" => "Login "
        ]);
    }









}