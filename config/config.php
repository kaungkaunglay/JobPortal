<?php

try{
    $host = 'localhost';
    $dbname = "jobboard";
    $user = "root";
    $pass = "" ;
    $conn = new PDO("mysql: host=$host;dbname=$dbname",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ex){
    echo $ex->getMessage();
}
//if($conn == true){
//    echo "connected successfully";
//}else{
//    echo "error";
//}