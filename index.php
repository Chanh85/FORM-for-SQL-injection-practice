<?php require_once 'controllers/authController.php'; 
if(!isset($_SESSION['id']))
{
    header('location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="containerHead"></div>
    <div class="container">
        <?php if(isset($_SESSION['message'])): ?>
            <div>
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>
        <div style="text-align: center;"> 
            
            <h3>Welcome, <?php echo $_SESSION['name'];?></h3>
        </div>

        <br><hr>
        <div>
        <a href="index.php?logout=1">logout here</a>
        </div>
        <br><hr>
        <?php if(!$_SESSION['verified']): ?>
            <div>
                You need to verify your account.
                Sign in to your email account and click on the verification link we just emailed you at
                <strong><?php echo $_SESSION['email'];?></strong>
            </div>
        <?php endif; ?>

        <?php if($_SESSION['verified']): ?>
            <div style="color: green;">I am verified!</div>
        <?php endif; ?>
    </div>

</body>
</html>