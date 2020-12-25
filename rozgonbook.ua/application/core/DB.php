<?php
namespace application\core;
class DB {

    protected $pdo = null;

    function __construct() {
        try {
            $this->pdo = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,'root','root');
        } catch (PDOException $e) {
            header('HTTP/1.1 500 Error connecting to database');
            header("Status: 500 Error connecting to database");
            $error = ['error' => 'Error connecting to database'];
            echo json_encode($error);
        }
    }
    public function getDB () {
        return $this->pdo;
    }
}
