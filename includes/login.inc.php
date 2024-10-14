<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        require_once "dbconn.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

        $errors = [];
        if(is_input_empty($email,$password)){
            $errors["empty_input"] = "fill in all fields!";
        }
        // if (!is_password_valid($password)) {
        //     $errors["invalid_password"] = "Password must be at least 8 characters long!";
        // }
        if(is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email format!";
        }

        $result=get_user($pdo,$email);
        if(is_email_wrong($result)){
            $errors["login_incorrect"] = "Incorrect login info!";
        }
        if(!is_email_wrong($result) && is_password_wrong($password,$result["password"])){
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        require_once "config_session.inc.php";
        if($errors){
            $_SESSION["errors_login"]=$errors;
            header("Location:../index.php");
            die();
        }
        session_regenerate_id(true);

        $_SESSION["user_id"]=$result["id"];
        $_SESSION["user_name"]=htmlspecialchars($result["name"]);
        $_SESSION["last_regeneration"]=time();

        header("Location: ../index.php?login=success");
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