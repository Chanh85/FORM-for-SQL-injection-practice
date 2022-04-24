<?php
require_once 'controllers/authController.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="containerHead">
        SQL Injection demo
    </div>
    <div class="container">
        <form action="register.php" method="POST">
        <div style="text-align: center;"><h1> SIGN UP</h1></div>
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
                    <label for="username">Username : </label>
                </div>
                <div class="col-75">
                    <input type="text" id="username" name="username" value="<?php echo $username; ?>" >
                </div>
            </div><br>
            <div class="row">
                <div class="col-25">
                    <label for="email">Email : </label>
                </div>
                <div class="col-75" style="margin-top: 3%;">
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" >
                </div>
            </div><br>
            <div class="row">
                <div class="col-25">
                    <label for="password">Password : </label>
                </div>
                <div class="col-75" style="margin-top: 3%;">
                    <input type="password" id="password" name="password" >
                </div>
            </div><br>
            <div class="row">
                <div class="col-25">
                    <label for="passwordConf">Confirm Password : </label>
                </div>
                <div class="col-75" style="margin-top: 3%;">
                    <input type="password" id="passwordF" name="passwordF" >
                </div>
            </div><br>
            <br><br><hr>
            <div class="row">
                <input type="submit" id="myButton" name="signUpButton" value="Sign Up!">
                <input type="reset" value="Reset"> 
            </div><br><br>
            <div class="row">
                <div>Already a member? <a href="login.php">Sign in!</a></div>
            </div>
        </form>
    </div>

</body>
</html>