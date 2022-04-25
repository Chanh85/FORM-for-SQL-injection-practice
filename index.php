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
            
            <h2>Welcome! You are logged in</h2>
            
            
        </div>

        <br>
        <div>
        <a href="index.php?logout=1">logout here</a>
        </div>
        <br><hr>
        
    </div>

</body>
</html>