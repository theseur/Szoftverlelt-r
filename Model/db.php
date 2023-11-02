<?php
class DatabaseModel {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Az adatbázishoz nem lehet csatlakozni!');
        }
    }

    public function getPDO() {
        return $this->pdo;
    }

    public function findAll($query){
        $result = $this->getPDO()->query($query, PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }
}
?>
