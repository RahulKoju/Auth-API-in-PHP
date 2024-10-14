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
    <title>Login/Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h3>
            <?php
                output_name();
            ?>
        </h3>
        <?php
            if(!isset($_SESSION["user_id"])){ ?>
                <h2>Sign Up</h2>
                <form action="includes/signup.inc.php" method="POST">
                    <div class="form-group">
                        <label for="signup-name">Full Name</label>
                        <input type="text" id="signup-name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="signup-email">Email</label>
                        <input type="email" id="signup-email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="signup-password">Password</label>
                        <input type="password" id="signup-password" name="password">
                    </div>
                    <button type="submit" class="btn">Sign Up</button>
                </form>
                <?php
                    check_signup_errors();
                ?>

                <h2>Login</h2>
                <form action="includes/login.inc.php" method="POST">
                    <div class="form-group">
                        <label for="login-email">Email</label>
                        <input type="email" id="login-email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" id="login-password" name="password">
                    </div>
                    <button type="submit" class="btn">Login</button>
                </form>
                <?php
                    check_login_errors();
                ?>
            <?php } else { ?>
                <h2>Logout</h2>
                <form action="includes/logout.inc.php" method="POST">
                    <button type="submit" class="btn">Logout</button>
                </form>
            <?php } ?>
    </div>
</body>
</html>