<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

		<link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/about-heading.css">
      <link rel="stylesheet" href="css/header.css">
	        <link rel="stylesheet" href="css/footer.css">



</head>
<body>
   
<?php include 'header.php'; ?>

<div class="about-heading">
   <h3>About</h3>
</div>

<section class="about">

   <div class="flex">


      <div class="content">
         <p>Nursery, place where plants are grown for transplanting, for use as stock for budding and grafting, or for sale.
		 Commercial nurseries produce and distribute woody and herbaceous plants, including ornamental trees, shrubs, and bulb 
		 crops. </p>
         <p>Egetative propagation is the most common method of propagating fruit crops. Prior to transplanting propagules 
		 in the main field, special skill and aftercare are necessary.
		 All of these tasks are successfully performed by skilled labor in this nursery under controlled conditions.</p>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">View Some Shots of our Nursery</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/a1.jpg" alt="Nursey Pic">

      </div>

      <div class="box">
         <img src="images/a2.jpg" alt="Nursey Pic">
        
      </div>
	   <div class="box">
         <img src="images/a3.jpg" alt="Nursey Pic">

      </div>

      <div class="box">
         <img src="images/a4.jpg" alt="Nursey Pic">
        
      </div>
	  
	   <div class="box">
         <img src="images/a5.jpg" alt="Nursey Pic">

      </div>

      <div class="box">
         <img src="images/a6.jpg" alt="Nursey Pic">
        
      </div>

    
     

   </div>

</section>





<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>