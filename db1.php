<?php
require 'functions.php';
require_once 'dbclass.php';
use Training\Db;


$clientIp = get_client_ip();
$serverDate = get_server_time();


if(isset($_GET['date'])){
    $clientTime = $_GET['date'];

}

//echo $clientIp."   ".$serverDate."   ". $clientTime;


$obj = new Db;
$obj->insertLog($clientIp,$serverDate,$clientTime);


// define('host', 'localhost');
//        define('serverUser','root');
//        define('serverPass', '');
//        define('databaseName', 'tutorial');
       
//        $dbc = mysqli_connect(host,serverUser,serverPass,databaseName) 
//                or die('could not connect'. mysqli_connect_error());

// $query = "INSERT INTO ip(id,client_ip,server_datetime,client_datetime) VALUES (NULL,'$clientIp','$serverDate','$clientTime')";
       
//        //$query = "INSERT INTO ip(id,client_ip,server_datetime,client_datetime) VALUES (NULL,2,2,2)";
// mysqli_query($dbc,$query);

