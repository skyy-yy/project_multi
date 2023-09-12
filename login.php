<?php
session_start();
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="ff">
    <div class="container">
        <div class="header">
            <h2>Login</h2>
        </div>

        <form action="login_db.php" method="post">
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="error">
                    <h3>
                        <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>
            <div class="input-group">
                <span>
                <i class="glyphicon glyphicon-user"></i>
                <input type="text" name="username" placeholder="Username">
                </span><br>
            </div>
            <div class="input-group">
                <span>
                <i class="glyphicon glyphicon-lock"></i>
                <input type="password" name="password" placeholder="Password">
                </span><br>
            </div>
            <div class="input-group">
                <button type="submit" name="login_user" class="btn">Login</button>
            </div>
            <p>Not yet a member? <a href="register.php">Sign Up</a></p>
        </form>
    </div>
</body>

</html>