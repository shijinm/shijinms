<?php

     $conn = mysqli_connect("localhost","root","","tutorial");
     $result = mysqli_query($conn, "SELECT * FROM ip");
     
     
     $data =array();
     
     while($row = mysqli_fetch_assoc($result)){
         $data[] = $row;
     }

     echo json_encode($data);