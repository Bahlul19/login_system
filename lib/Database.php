<?php

class Database
{
//    private $db_host = "localhost";
//    private $db_user = "root";
//    private $db_pass = "";
//    private $db_name = "db_login";
//    public $pdo;
//    
//    public function __construct()
//    {
//        if(!isset($this->pdo))
//        {
//            try
//            {
//                $link = new PDO("mysqli:host=".$this->db_host."; dbname=".$this->db_name,$this->db_user,$this->db_pass);
//                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                $link->exec("SET CHARECTER SET utf-8");
//                $this->pdo = $link;
//            }
//            catch (PDOException $ex)
//            {
//                die("Field to connect with Database".$ex->getMessage());
//            }
//        }
//    }
    
    private $db_host = "localhost";
    private $db_name = "db_login";
    private $db_user = "root";
    private $db_pass = "";
    public $pdo;
    
    public function __construct()
    {
        if(!isset($this->pdo))
        {
            try
            {
                $link = new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name,$this->db_user,$this->db_pass);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER SET utf8");
                $this->pdo = $link;
            } 
            catch (PDOException $e)
            {
               die("Failed to connect with Database ".$e->getMessage());
            }
        }
    }
    
}

?>