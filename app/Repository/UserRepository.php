<?php

namespace Gregorio\Repository;

use Gregorio\Entity\User;
use Gregorio\Model\RegisterRequest;
use Gregorio\Model\RegisterResponse;

class UserRepository
{
    private \PDO $koneksi;


    public function __construct(\PDO $koneksi)
    {
        $this->koneksi = $koneksi;
    }

    public function save(User $user): User
    {
        $statement = $this->koneksi->prepare("INSERT INTO users(username, password)
        VALUES (?,?) ");
        $statement->execute([
            $user->username,
            $user ->password,
        ]);

        return $user;

    }

    public function findById(string $username): ? User
    {
        $statement = $this->koneksi->prepare("SELECT username,password FROM users WHERE username=?");
        $statement->execute([$username]);

        try {
            if ($row = $statement->fetch()) {
                $user = new User();
                $user->username = $row['username'];
                $user->password = $row['password'];
                return $user;

            } else {
                return null;
            }

        } finally {
            $statement->closeCursor();
        }

    }

}