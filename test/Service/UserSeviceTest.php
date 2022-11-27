<?php

namespace Gregorio\Service;

use Gregorio\Config\Database;
use Gregorio\Entity\User;
use Gregorio\Exception\ValidateExecption;
use Gregorio\Model\LoginRequest;
use Gregorio\Model\RegisterRequest;
use Gregorio\Model\RegisterResponse;
use Gregorio\Repository\UserRepository;
use Gregorio\Repository\TransaksiRepository;
use PHPUnit\Framework\TestCase;

class UserSeviceTest extends TestCase

{
    private ServiceLogin $userService;

    private UserRepository $repositoryLogin;

    public function setUp(): void
    {
        $koneksi = Database::getConnection();
        $this->repositoryLogin = new UserRepository($koneksi);
        $this->userService = new ServiceLogin($this->repositoryLogin);

    }

    public function testRegisterSuccess()
    {
        $request = new RegisterRequest() ;
        $request->username = "Spower";
        $request->password = "|axelNuva07|";

        $response = $this->userService->save($request);


        self::assertEquals($request->username, $response->user->username);

    }

    public function testRegisterDuplicate()
    {

        $request = new User();
        $request->username= "gregorio";
        $request->password = "rahasia";

        $this->repositoryLogin->save($request);


        $this->expectException(ValidateExecption::class);

        $request = new RegisterRequest();
        $request->username= "gregorio";
        $request->password = "rahasia";

        $this->userService->save($request);
    }

    public function testRegisterFailed()
    {


        $this->expectException(ValidateExecption::class);

        $request = new RegisterRequest();
        $request->username= " ";
        $request->password = " ";

        $this->userService->save($request);
    }


    public function testLoginNotFound()
    {
        $this->expectException(ValidateExecption::class);

        $request = new LoginRequest();
        $request->username = "eko";
        $request->password ="gege";

        $this->userService->login($request);
    }

    public function testLoginWrongPassword()
    {


        $this->expectException(ValidateExecption::class);

        $request = new LoginRequest();
        $request->username = "Spower";
        $request->password = "|axelNuva07|";

        $this->userService->login($request);
    }

    public function testLoginSuccess()
    {
        $user = new User();
        $user->id = "Spower";
        $user->name = "|axelNuva07|a";
        $user->password = password_hash("eko", PASSWORD_BCRYPT);

        $this->expectException(ValidationException::class);

        $request = new LoginRequest();
        $request->username = "Spower";
        $request->password = "|axelNuva07|";

        $response = $this->userService->login($request);

        self::assertEquals($request->username, $response->user->username);
        self::assertTrue(password_verify($request->password, $response->user->password));
    }


}


