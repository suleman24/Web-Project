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
   <link rel="stylesheet" href="css/payments.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>


<section class="payments">
<center>    <h1 class="title">Payments</h1>  </center>




   <div class="box-container">
   
   
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
		 <p>Completed Payments</p>
         <h3>Rs <?php echo $total_completed; ?> </h3>
         
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
		  <p>Total Pendings</p>
         <h3>Rs <?php echo $total_pendings; ?></h3>
        
      </div>

      

      
	  
	  
	  
		

     


   </div>

</section>


</body>
</html>