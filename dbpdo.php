<?php
require_once 'functions.php';

$clientIp = get_client_ip();
$serverDate = get_server_time();


if(isset($_GET['date'])){
    $clientTime = $_GET['date'];

}

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "tutorial";

$dsn ='mysql:host='.$dbHost.';dbname='.$dbName;

$pdo = new PDO($dsn,$dbUser,$dbPass);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

// $stmt = $pdo->query('SELECT * FROM logdetails');

// while($row = $stmt->fetch()){
//     echo $row['client_ip'] . '<br>';
//     echo $row['server_datetime'] . '<br>';
//     echo $row['client_datetime'] . '<br>';

// }

// while($row = $stmt->fetch(PDO::FETCH_OBJ)){
//     echo $row->client_ip . '<br>';
// }

//positional parameters(supported in mysqli)
// $id =20;
// $sql ='SELECT * FROM logdetails WHERE id = ?';
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$id]);
// $log = $stmt->fetchAll();
// //var_dump($log);
// foreach($log as $logs){
//     echo $logs['client_ip'] . '<br>';
//     echo $logs['server_datetime'] . '<br>';
//     echo $logs['client_datetime'] . '<br>';
// }

//named parameters
// $id =20;
// $sql ='SELECT * FROM logdetails WHERE id = :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id]);
// $log = $stmt->fetchAll();
// //var_dump($log);
// foreach($log as $logs){
//     echo $logs['client_ip'] . '<br>';
//     echo $logs['server_datetime'] . '<br>';
//     echo $logs['client_datetime'] . '<br>';
// }

$sql = 'INSERT INTO logdetails(client_ip,server_datetime,client_datetime) 
VALUES (:ip,:sv,:cl)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['ip'=>$clientIp,'sv'=>$serverDate,'cl'=>$clientTime]);
