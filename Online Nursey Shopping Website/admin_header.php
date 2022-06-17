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
 
        <h2 class="logo"> Admin Panel</h2>
 
        <nav>
            <ul class="nav__links">
                <li><a href="admin_page.php">Home</a></li>
                <li><a href="admin_products.php">Products</a></li>
                <li> <a href="admin_orders.php">Orders</a></li>
				<li ><a href="admin_users.php">Users</a></li>
                <li><a href="admin_contacts.php">Messages</a></li>
            </ul>
        </nav>
 
            <a style="color:pink; " href="logout.php">Logout</a>
 
    </header>