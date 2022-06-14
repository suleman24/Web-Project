<?php

include "config.php";

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $user_type = $_POST['user_type'];
 
    if(!preg_match("|^[a-zA-Z]{3,25}$|",$name))
    {
    header("location:register.php?regmsg=Invalid Name");
        exit();
    }
    if(!preg_match("|^[a-zA-Z0-9_.]+@[a-z]{3,5}.[a-z]{3}$|",$email))
    {
    header("location:register.php?regmsg=Invalid Email");
    exit();
    }
  
    if($pass != $cpass){
        header("location:register.php?regmsg=Confirm password does not match");

        
    }

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' ") or die('query failed');

    if(mysqli_num_rows($select_users) > 0){
        header("location:register.php?regmsg=User Already exists");
     }
        
    

     else
     {
    
            mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
            header("location:register.php?regmsg=Accoount created successfully");

         
     }
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="css/login_signup.css">

</head>
<body style=" background-image: url(images/back.jpg);
    background-repeat: no-repeat;
    background-size:cover;
    margin:0
 ">





    <div class="form-container">
        <form action="" method = "post">

        <h1 style="color:white">Signup</h1>

        <table>
        
            <td>
                <tr>
                <input class="box" type="text" name="name" placeholder = "Enter Your Name" >

                </tr>

            </td>
            <td>
                <tr>
                <input required  class="box" type="email" name="email" placeholder = "Enter Your Email" >

                </tr>

            </td>
            <td>
                <tr>
                <input required  class="box" type="password" name="password" placeholder = "Enter Password" >

                </tr>

            </td>
            <td>
                <tr>
                <input required  class="box" type="password" name="cpassword" placeholder = "Confirm Password" >

                </tr>

            </td>
            <td>
                <tr>
                <select name="user_type" class="select">
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select>
                </tr>

            </td>
            <td>
                <tr>
                <input class="btn" type="submit" name="submit" value="register now">

                </tr>

            </td>
            <td>
                <tr>
                <p>Already have an Account? <a href="login.php">login now</a></p>

                </tr>

            </td>

            <td>
                <tr>
                    <h1 style="color:green">
                    <?php
                    error_reporting(0);
                    echo $_GET['regmsg'];
                    ?>
                    </h1>
             

                </tr>

            </td>

        </table>
           
    
        </form>
    </div>
</body>
</html>