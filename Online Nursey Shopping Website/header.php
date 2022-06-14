<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>





  
  <header>
 
        <h2 class="logo"> COMSATS Nursery </h2>
 
        <nav>
            <ul class="nav__links">
                <li><a href="home.php">Home</a></li>
                <li>  <a href="about.php">About</a></li>
                <li><a href="shop.php">Buy</a></li>
				<li ><a href="search_page.php">Search</a></li>
                <li> <a href="orders.php">Orders</a></li>
            </ul>
        </nav>
 
            <a style="color:pink; " href="logout.php">Logout</a>
 
    </header>