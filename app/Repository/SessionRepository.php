<?php

namespace Gregorio\Repository;



use Gregorio\Entity\Session;

class SessionRepository
{

    private \PDO $connection;
    private UserRepository $repositoryLogin;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }


    public function save(Session $session): Session
    {
        $statement = $this->connection->prepare("INSERT INTO session(id, user_id) VALUES (?, ?)");
        $statement->execute([$session->id, $session->userId]);
        return $session;

    }

    public function findById(string $id): ?Session
    {
        $statement = $this->connection->prepare("SELECT id, user_id from session WHERE id = ?");
        $statement->execute([$id]);

        try {
            if($row = $statement->fetch()){
                $session = new Session();
                $session->id = $row['id'];
                $session->userId = $row['user_id'];
                return $session;
            }else{
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteById(string $id): void
    {
        $statement = $this->connection->prepare("DELETE FROM session WHERE id = ?");
        $statement->execute([$id]);
    }

    public function deleteAll(): void
    {
        $this->connection->exec("DELETE FROM session");
    }




}