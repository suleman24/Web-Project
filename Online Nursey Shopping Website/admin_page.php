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


<button style="background-color:#313131">
<div class="box">
         <p>Payments</p>
      </div>



</button>

<button style="background-color:#313131">
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














      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         <h3>$<?php echo $total_pendings; ?>/-</h3>
         <p>Total Pendings</p>
      </div>

      <div class="box">
         <?php
            $total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
         <h3>$<?php echo $total_completed; ?>/-</h3>
         <p>Completed Payments</p>
      </div>

      
	  
	  
	  
		

     


   </div>

</section>











<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>