<?php

    declare(strict_types=1);
    
    function get_name(object $pdo, string $name){
        $query="SELECT name FROM users WHERE name = :name;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":name",$name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function get_email(object $pdo, string $email){
        $query="SELECT email FROM users WHERE email = :email;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function set_user(object $pdo,string $password,string $name,string $email){
        $query="INSERT INTO users (name,email,password) VALUES (:name,:email,:password);";
        $stmt = $pdo->prepare($query);
        $hashedPassword=password_hash($password,PASSWORD_BCRYPT);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":password",$hashedPassword);
        $stmt->execute();
    }