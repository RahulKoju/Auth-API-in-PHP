<?php
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="includes/signup.inc.php" method="POST">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" class="btn">Sign Up</button>
        </form>
        <?php
            check_signup_errors();
        ?>

        <h2>Login</h2>
        <form action="includes/login.inc.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <?php
            check_login_errors();
        ?>
    </div>
    
</body>
</html>
