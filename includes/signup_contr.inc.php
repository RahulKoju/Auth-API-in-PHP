<?php

    declare(strict_types=1);

    function is_input_empty(string $email,string $name,string $password){
        if (trim($email) === '' || trim($name) === '' || trim($password) === '') {
            return true;
        }else{
            return false;
        }
    }
    function is_password_valid(string $password): bool {
        // Check password length (at least 8 characters, for example)
        if (strlen($password) < 8) {
            return false;
        }
        // Optionally, you can add more checks (like checking for upper case, special characters, etc.)
        // Example:
        // if (!preg_match('/[A-Z]/', $password)) { // At least one uppercase letter
        //    return false;
        // }
        // if (!preg_match('/[a-z]/', $password)) { // At least one lowercase letter
        //    return false;
        // }
        // if (!preg_match('/\d/', $password)) { // At least one digit
        //    return false;
        // }
        // if (!preg_match('/[^\w]/', $password)) { // At least one special character
        //    return false;
        // }
        
        return true;
    }
    
    function is_email_invalid(string $email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
    function is_name_taken(object $pdo,string $name){
        if(get_name($pdo,$name)){
            return true;
        }else{
            return false;
        }
    }
    function is_email_registered(object $pdo,string $email){
        if(get_email($pdo,$email)){
            return true;
        }else{
            return false;
        }
    }
    function create_user(object $pdo,string $password,string $name,string $email){
        set_user($pdo,$password,$name,$email);
    }