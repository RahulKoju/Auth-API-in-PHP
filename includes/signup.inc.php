<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        require_once "dbconn.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        $errors = [];
        if(is_input_empty($email,$name,$password)){
            $errors["empty_input"] = "fill in all fields!";
        }
        // if (!is_password_valid($password)) {
        //     $errors["invalid_password"] = "Password must be at least 8 characters long!";
        // }
        if(is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email format!";
        }
        if(is_name_taken($pdo,$name)){
            $errors["name_taken"] = "Username already exists!";
        }
        if(is_email_registered($pdo,$email)){
            $errors["email_used"] = "Email already registered!";
        }
        require_once "config_session.inc.php";
        if($errors){
            $_SESSION["errors_signup"]=$errors;
            header("Location:../index.php");
            die();
        }

        create_user($pdo, $password, $name, $email);
        header("Location: ../index.php?signup=success");
        $pdo=null;
        $stmt=null;
        die();
    } catch (PDOException $e) {
        die("Query failed: ".$e->getMessage());
    }
}else{
    header("Location:../index.php");
    die();
}
?>