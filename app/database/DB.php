<?php
namespace App\database;

use PDO;

class DB
{
    private $host;
    private $user;
    private $password;
    private $db;
    private $charset;
    private $conn;

    function __construct(){
         $this->host =  $_ENV["HOST"];
         $this->user = $_ENV["USER"];
         $this->password = $_ENV["PASSWORD"];
         $this->db = $_ENV["DB"];
         $this->charset = $_ENV["CHARSET"];
    }

    public function conexion()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            require_once "app/views/errors/503.php";
            exit();
        }
    }

    public function close()
    {
        $this->conn = null;
    }

}
