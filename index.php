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
            
            <h2>Welcome <?php echo $_SESSION['username'] ?></h2>
        </div>
        <hr>
        <div>
            <form method="POST">
                <label for="search">Search for user: </label>
                <input type="text" name="search" id="search">
                <br><br>
                <input type="submit" name="searchButton" value="Search!" style="margin-left: 40%;">
            </form>
        </div><br><br>
        <?php 
            if(count($errors) > 0): ?>
                <div style="color: red;">
                <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
                </div>
        <?php endif; ?><br><br>

<?php
       if(isset($_POST['searchButton']))
       {
            $search = $_POST['search'];

            if(empty($search)){
            $errors['search'] = 'Search something!';     
            }
            if(count($errors) === 0)
            {
                /*$sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $search);
                $stmt->execute();
                $result = $stmt->get_result();*/
                $sql = "SELECT * FROM users WHERE username = '$search' ";
                $result = mysqli_query($conn,$sql);
                 
                //$user = mysqli_fetch_array($result);
               
            
            
                while($user = $result->fetch_assoc()) 
                {  
                    ?>
                    <table>
                        <tr>
                            <td>
                                <?php echo "id: " . $user['id'] ; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "username: ". $user['username'] ; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo "email: " .  $user['email'] ; ?>
                            </td>
                        </tr>
                    </table> 
<?php           }
        }

    } 
?>
  
        
              
        <br>
        <div>
        <a href="index.php?logout=1">logout here</a>
        </div>
        <br><hr>
        
    </div>

</body>
</html>
