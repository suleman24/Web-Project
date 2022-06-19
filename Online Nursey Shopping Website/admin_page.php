<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>



   <link rel="stylesheet" href="css/header.css">
   <link rel="stylesheet" href="css/admin-home.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>


<section class="dashboard">
<center>    <h1 class="title">Dashboard</h1>  </center>




   <div class="box-container">


<button style="background-color:#313131"    onclick="window.location.href='admin_payments.php';">
<div class="box">
         <p>Payments</p>
      </div>



</button>

<button style="background-color:#313131"    onclick="window.location.href='admin_users.php';">
<div class="box">
         <p>Accounts</p>
      </div>



</button>



 <div class="box">
         <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
		 <h3>Products Added</h3>
         <p><?php echo $number_of_products; ?></p>
         
      </div>




<div class="box">
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
		  <h3>Orders Placed</h3>
         <p><?php echo $number_of_orders; ?></p>
        
      </div>




   </div>

</section>

<script src="js/admin_script.js"></script>

</body>
</html>