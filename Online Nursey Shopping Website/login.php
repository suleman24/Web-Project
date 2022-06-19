<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email =  $_POST['email'];
   $pass = md5($_POST['password']);

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }

   }else{
        header("location:login.php?regmsg=Invalid email or Password");
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>


   <link rel="stylesheet" href="css/login_signup.css">

</head>
<body style=" background-image: url(images/back.jpg);
    background-repeat: no-repeat;
    background-size:cover;
    margin:0
 ">





    <div class="form-container">
        <form action="" method = "post">

        <h1 style="color:white">Login</h1>

        <table>
        
      
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
                <input class="btn" type="submit" name="submit" value="Login">

                </tr>

            </td>
            <td>
                <tr>
                <p>Don't have an Account? <a href="register.php">Sign up</a></p>

                </tr>

            </td>

            <td>
                <tr>
                    <h1 style="color:red">
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