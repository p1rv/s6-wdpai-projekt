<?php

require_once "Repository.php";
require_once __DIR__ . '/../models/User.php';

class ClientRepository extends Repository
{
    public function getClientsNo(): int
    {
        $stmt = $this->database->connect()->prepare('SELECT count(id) AS "no" FROM tcs.clients');
        $stmt->execute();

        $count = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($count == false) {
            return 0;
        }

        return $count['no'];
    }
}
