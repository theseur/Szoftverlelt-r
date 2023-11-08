<?php

require_once __DIR__ . '/../Model/db.php';
require_once __DIR__ . '/../Model/felhasznalok.php';
require_once __DIR__ . '/../Model/hirek.php';

class UserService
{

    private $dbModel;

    public function __construct()
    {
        $this->dbModel = new DatabaseModel();
    }

    public function listUsers(): array
    {
        $users = [];
        foreach ($this->dbModel->findAll("SELECT * FROM felhasznalok") as $row) {
            $users[] = Felhasznalok::instanceof($row);
        }
        return $users;
    }

    public function hirek(): array
    {
       //TODO: [theseur] --> Ezek a static hívások és a folytonos db connection újra nyitás nem egy szép megoldás

       return Hirek::getAll();
    }
}
