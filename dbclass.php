<?php 
namespace Training;

require_once 'functions.php';

use mysqli;

class Db
{
    private $dbHost;
    private $serverUser;
    private $serverPass;
    private $databaseName;
    private $conn = null;

    public function __construct() {
        $this->dbHost = "localhost";
        $this->dbUser = "root";
        $this->dbPass = "";
        $this->databaseName = "tutorial";
        $this->conn = $this->connect();
    }

    private function connect() {
        $conn = new mysqli(
            $this->dbHost,
            $this->dbUser,
            $this->dbPass,
            $this->databaseName
        );
        if (!$conn) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    
    function insertLog($clientIp, $serverDate, $clientTime)
    {
        $query = "INSERT INTO ip(client_ip,server_datetime,client_datetime) 
                    VALUES (?,?,?)";
        return $this->query($query, [&$clientIp, &$serverDate, &$clientTime]);
    }

    function query(string $sql, array $arguments){
        $statement = $this->conn->prepare($sql);
        $argTypes = "";
        foreach($arguments as $arg){
            $argTypes .= $this->getArgType($arg);
        }
        $bindArgs = array_merge([$argTypes], $arguments);
        \call_user_func_array([$statement, 'bind_param'], $bindArgs);
        return $statement->execute();
    }

    private function getArgType($arg) {
        $type = gettype($arg);
        switch($type) {
            case 'boolean':
            case 'integer':
                return 'i';

            case 'double':
                return 'd';

            case 'string':
            case 'NULL':
            case 'unknown type':
                return 's';
        }
    }

    

    function getLog(){
        $result = mysqli_query($this->conn, "SELECT * FROM ip");
        $data =array();
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        echo json_encode($data);
    }

    function closeDb(){
        $this->conn -> close();
    }

}