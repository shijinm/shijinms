<?php 
require_once 'functions.php';

$clientIp = get_client_ip();
$serverDate = get_server_time();
class Db{
    private $dbHost;
    private $serverUser;
    private $serverPass;
    private $databaseName;

    public function __construct(){
    
        
    }

    function connect(){
        try {
        $this->$dbHost = "localhost";
        $this->$serverUser = "root";
        $this->$serverPass = "";
        $this->$databaseName = "tutorial";

        $pdo = new PDO($this->$dbHost,$this->$serverUser,$this->$serverPass,$this->$databaseName);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $e) {
            echo "Error while connecting to Database". $e->getMessage();
        }
        

      
    }
}
   
