<?php
session_start();
require 'config/db.php';

$errors = array();
$username = "";
$email = "";
//check if user clicks on the sign up button
if(isset($_POST['signUpButton'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordF = $_POST['passwordF'];

    //validation
    if(empty($username)){
        $errors['username'] = 'Username required';     
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email is invalid';
    }
    if(empty($email)){
        $errors['email'] = 'Email required';     
    }
    if(empty($password)){
        $errors['password'] = 'Password required';     
    }
    if($password !== $passwordF)
    {
        $errors['password'] = 'Passwords do not match';  
    }

    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if($userCount > 0){
        $errors['email'] = 'Email already exist'; 
    }

    if(count($errors) === 0)
    {
        //$password = password_hash($password,PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username,email,password) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss',$username, $email,$password);

        if($stmt->execute()){   
            //login
            $user_id = $conn->insert_id;
            $_SESSION['id'] = $user_id;
            
            $_SESSION['message'] = "You are logged in!";    
            header('location: index.php');
            exit();
        }
        else{
            $errors['db_error'] = "Database error: failed to register";
        }
    }
   
}

//if user clicks login


if(isset($_POST['login-button'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //validation
    if(empty($username)){
        $errors['username'] = 'Username required';     
    }
    if(empty($password)){
        $errors['password'] = 'Password required';     
    }

    if(count($errors) === 0)
    {
        $sql = "SELECT * FROM users WHERE username =  '$username' and password = '$password'";


       
        /*$sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);


        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){
            //login success
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = $user['verified'];
            $_SESSION['message'] = "Logged in successfully!";    
            header('location: index.php');
            exit();
        }
        else{
            $errors['login_fail'] = "Wrong credentials";
        }*/
        $result = mysqli_query($conn,$sql);
        while($data = mysqli_fetch_array($result))
        {
            if($data['username'] == $username)
            {
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['message'] = "You are logged in!";
            }
        }
      
        header('location: index.php');
        //$stmt->close();
        //$conn->close();
    
    }
    
    
}



if(isset($_GET['logout'])){
session_destroy();
header('location: login.php');
exit();
}
