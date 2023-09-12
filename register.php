<?php
session_start();
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="fg">
    <div class="container">
    <div class="header">
        <h2>Register</h2>
    </div>

    <form action="register_db.php" method="post">
        <?php include('errors.php'); ?>
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
            <input type="text" name="username"  placeholder="Enter Username">
            </span><br>
        </div>
        <div class="input-group">
            <span>
            <i class="glyphicon glyphicon-user"></i>
            <input type="text" name="fullname"  placeholder="Enter Fullname">
            </span><br>
        </div>
        <div class="input-group">
            <span>
            <i class="glyphicon glyphicon-envelope"></i>
            <input type="email" name="email" placeholder="Enter Email">
            </span><br>
        </div>
        <div class="input-group">
            <span>
            <i class="glyphicon glyphicon-eye-close"></i>
            <input type="password" name="password_1" placeholder="Enter Password">
            </span><br>
        </div>
        <div class="input-group">
            <span>
            <i class="glyphicon glyphicon-eye-close"></i>
            <input type="password" name="password_2" placeholder="Confirm Password">
            </span><br>
        </div>
        <div class="input-group">
            <span>
            <i class="glyphicon glyphicon-earphone"></i>
            <input type="text" name="telephone"  placeholder="Enter Telephone">
            </span><br>
        </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Register</button>
        </div>
        <p>Already a member? <a href="login.php">Login</a></p>
    </form>
    </div>
</body>

</html>