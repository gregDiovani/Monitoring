<?php

namespace Gregorio\Service;

use Gregorio\Config\Database;
use Gregorio\Entity\User;
use Gregorio\Exception\ValidateExecption;
use Gregorio\Model\LoginRequest;
use Gregorio\Model\LoginResponse;
use Gregorio\Model\RegisterRequest;
use Gregorio\Model\RegisterResponse;
use Gregorio\Repository\UserRepository;





class ServiceLogin
{




    private UserRepository $repositoryLogin;

    /**
     * @param UserRepository $repositoryLogin
     */
    public function __construct(UserRepository $repositoryLogin)
    {
        $this->repositoryLogin = $repositoryLogin;
    }


    /**
     * Service Untuk Register
     */

    public function save(RegisterRequest $request): RegisterResponse
    {
        $this->validateInsertLogin($request);

        $user = $this->repositoryLogin->findById($request->username);
        if($user != null ){
            throw new ValidateExecption("User ID already exsist");
        }

        try {
            Database::beginTransaction();
            $user = new User();
            $user->username = $request->username;
            $user->password = password_hash($request->password,PASSWORD_BCRYPT);

            $this->repositoryLogin->save($user);

            ///Tampilkan response
            $response = new RegisterResponse();
            $response->user= $user;
            Database::commitTransaction();
            return $response;

        }catch (\Exception $exception){
            Database::rollbackTransaction();
            throw $exception;
        }

    }

    public function validateInsertLogin(RegisterRequest $registerRequest){

        if($registerRequest->username == null || $registerRequest->password ==null  ||  trim($registerRequest->username ) == ""  || trim($registerRequest->password ) == ""  )
        {
            throw new ValidateExecption("username dan password tidak boleh kosong");
        }


    }


    /**
     * Service Untuk Login
     */

    public function login(LoginRequest $loginRequest): LoginResponse
    {

        $this->validateLoginRequest($loginRequest);

        $user = $this->repositoryLogin->findById($loginRequest->username);
        if($user == null){
            throw new ValidateExecption("id dan password salah");
        }

        if(password_verify($loginRequest->password, $user->password)){
            $response = new LoginResponse();
            $response -> user = $user;

            return $response;

        }else{
            throw new ValidateExecption("id dam password salah");
        }

    }

    public function validateLoginRequest(LoginRequest $loginRequest){


        if($loginRequest->username == null || $loginRequest->password == null  ||  trim($loginRequest->username ) == ""  || trim($loginRequest->password ) == ""  )
        {


            throw new ValidateExecption("username dan password tidak boleh kosong");
        }




}



}