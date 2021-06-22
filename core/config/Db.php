<?php declare(strict_types = 1);

namespace core\config;

use PDO;

class Db
{

    protected $servername = "localhost";
    protected $username = "root";
    protected $dbname = "ecomm";
    protected $password = "";

    public function connect():string {

        try {
            
            $con = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;

        } catch (PDOException $e) {
            return "Connection failed: ". $e->getMessage();
        }

    }

}