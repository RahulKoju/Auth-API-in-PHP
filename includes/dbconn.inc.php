<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "auth";

    try {
      $pdo=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    } catch (PDOException $e) {
      die("Connection failed: ".$e->getMessage());
    }
?>