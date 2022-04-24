<?php
require_once 'controllers/authController.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="containerHead">
        SQL Injection demo
    </div>
    <div class="container">
        <form action="login.php" method="POST">
            <div style="text-align:center"><h1>LOG IN</h1></div>
            <br><hr>
            <?php 
            if(count($errors) > 0): ?>
                <div style="color: red;">
                <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-25">
                    <label for="username"> Your email or username: </label>
                </div>
                <div class="col-75">
                    <input type="text" id="username" name="username" value="<?php echo $username; ?>"  style="margin-top: 3%">
                </div>
            </div><br>
            <div class="row">
                <div class="col-25">
                    <label for="password"> Your password : </label>
                </div>
                <div class="col-75">
                    <input type="password" id="password" name="password"  style="margin-top: 5%">
                </div>
            </div><br>
            <br><br><hr>
            <div class="row">
                <input type="submit" id="myButton" name="login-button" value="Sign In">
                <input type="reset" value="Reset"> 
            </div><br><br>
            <div class="row">
                <div>Not yet a member? Back to Sign Up <a href="register.php">Here</a></div>
            </div>
        </form>

    </div>
</body>
</html>