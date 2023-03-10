<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>HfDistribuidora</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
     <!--  <h3>Ofertas..</h3>
      <p>En productos seleccionados...</p> -->
      <a href="about.php" class="white-btn">descubrir más</a>
   </div>

</section>

<section class="products">

   <h1 class="title">últimos productos</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
         <div class="imagen">
            <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         </div>

         <div class="info">
            <div class="name"><?php echo $fetch_products['name']; ?>
            </div>
            <div class="price">$<?php echo $fetch_products['price']; ?>/-
            </div>
            <input type="number" min="1" name="product_quantity" value="1" class="qty">
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
         </div>
         
         <div class="booton">
            <input type="submit" value="añadir al carrito" name="add_to_cart" class="btn">
         </div>
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no hay productos añadidos todavía!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">carga más</a>
   </div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>Sobre nosotros</h3>
         <p>Somos una empresa con una vasta trayectoria al servicio de farmacias, droguerías, clínicas, hospitales y afines.
Nuestro principal objetivo es brindar la mejor calidad en nuestra atención con una amplia variedad de artículos a los mejores precios de plaza y una eficaz entrega; contamos con vehículos propios y un equipo de venta capacitado con experiencia al total servicio de nuestra clientela.
El equipo de HF Distribuidor trabaja desde Córdoba con una amplia red de distribución a todo el país.</p>
         <a href="about.php" class="btn">leer más</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>Donde comprar nuestros productos</h3>
      <p>
         Apteka / Diagonal Ica 594 - Bº General Bustos - Cordoba / Tel. (0351) - 4722874
         Bornard Argovic / Av. Alem 3701 - Bº Alem - Cordoba / Tel. (0351) - 4794239
         Calle Carina / Av. Vucetich 6895 - Bº Ituzaingo - Cordoba / Tel. (0351) - 4977292
         Carini / Presidente Italia 537 - Bº Malvinas Argentinas - Cordoba / Tel. (0351) - 4997350
         Circulo de Suboficiales y Agentes Asociacion Mutual Policia de Cordoba / Santa Rosa 974 - Bº Centro - Cordoba / Tel. (0351) - 4210285
         Di Carlo S.R.L. / 24 de Septiembre 2415 - Bº Yapeyu - Cordoba / Tel. (0351) - 4528801
         Di Farma S.R.L. / Altolaguirre 2660 - Bº Yofre - Cordoba / Tel. (0351) - 4868008
         Di Farma S.R.L. / Altolaguirre 2264 - Bº Yofre - Cordoba / Tel. (0351) - 4530850
         Far Ma Max / Arturo Capdevila 1855 - Cordoba / Tel. (0351) - 4789555
         Farma Norte / Av. japon Esq. Juan B. Justo - Cordoba / Tel. (0351) - 4994368
         Farma Social / Esquiu 111 - Bº alto General Paz - Cordoba / Tel. (0351) - 4522141
         Farma Social / Sucre 174 - Bº Centro - Cordoba / Tel. (0351) - 4211523
         Farma Yorfre / Altolaguirre 2112 - Bº Yofre Norte - Cordoba / Tel. (0351) - 4516516
         Farmacia Abc / Alvear 298 - Bº Centro - Cordoba / Tel. (0351) - 4219407
         Farmacia Abril / Av. Armada Argentina 46 - Bº Las Flores - Cordoba / Tel. (0351) - 4619408
         Farmacia Aefe / Viamonte 6 - Bº Junior - Cordoba / Tel. (0351) - 4516981
         Farmacia Alemana / San Jeronimo 587 - Bº Centro - Cordoba / Tel. (0351) - 4227984
         Farmacia Alvear / Alvear esq. Sarmiento - Bº Centro - Cordoba / Tel. (0351) - 4210024
         Farmacia Amadeo / Av. Sabattini 2630 - Bº Gral Urquiza - Cordoba / Tel. (0351) - 4583760
</p>
      <a href="contact.php" class="white-btn">Contacta con nosotros</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>