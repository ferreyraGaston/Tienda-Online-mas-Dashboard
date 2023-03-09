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

<header class="header">

   <div class="flex container">

      <a href="admin_page.php" class="logo">Administrador<span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_page.php">Inicio</a>
         <a href="admin_products.php">productos</a>
         <a href="admin_orders.php">ordenes</a>
         <a href="admin_users.php">usuarios</a>
         <a href="admin_contacts.php">mensajes</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>nombre de usuario : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">cerrar sesión</a>
         <div>nuevo <a href="login.php">acceso</a> | <a href="register.php">registrarse</a></div>
      </div>

   </div>

</header>