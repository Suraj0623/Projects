<!-- connect file to be able to use $con 
so that brand are display in home pages -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display products when searched in searched bar</title>
    <!--bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!--font awesome  link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!--css link -->
     <link rel="stylesheet" href="style.css">

</head>
<body>
     <!--navbar -->
 <div class="container-fluid p-0"> 
     <!--first child -->  
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="./images/logo.png" alt="logo" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_product.php"><i class="fa fa-product-hunt" aria-hidden="true"></i>Our Products</a>
        </li>
        <?php
        if(isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/profile.php'>My Account</a>
          </li>";

        }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true">Cart <sup><?php cart_item(); ?></sup></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php"><i class="fa fa-phone-square" aria-hidden="true"></i>Contact US</a>
        </li>
        
      <form class="d-flex" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
      
    </div>
  </div>
</nav>
<!-- calling function cart -->
<?php
cart();
?>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark  bg-secondary">
  <ul class="navbar-nav me-auto" >
   
    <?php
  if(!isset($_SESSION['username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='#'>WELCOME GUEST</a>
    </li>";
   }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='#'>WELCOME " . $_SESSION['username']. " </a>
    </li>";
   
   }
if(!isset($_SESSION['username'])){
echo "<li class='nav-item'>
<a class='nav-link' href='./user_area/user_login.php'>LogIn</a>
</li>";
}else{
echo "<li class='nav-item'>
<a class='nav-link' href='./user_area/logout.php'>Log Out</a>
</li>";

}



?>
  </ul>
  </nav>
<!-- third child -->
<div class="bg-light">
  <h3 class="text-center">All In One shop</h3>
  <p class="text-center">Welcome to All In One personal shop</p>
</div>
<!-- fourth child -->
<div class="row px-1">
  <div class="col-md-10">
    <!-- products -->
    <div class="row">
      <!-- fetching products from database -->
       <?php
      //  calling functions from functiona folder
      search_product();
       get_unique_category(); 
       get_unique_brand(); 
      ?> 
        
<!-- row end -->

       </div>
<!-- col end -->
   </div>
  <div class="col-md-2 bg-secondary">
    <!-- sidenav -->
    <!-- brands to be dispaly -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Our Collaborative Brands</h4></a>
      </li>
      <?php
      //calling functions
      getbrand();

    ?>
    </ul>
    <!-- categories -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
      </li>
      <?php
       getcategory();
       
    ?>
      
    </ul>
  </div>
</div>




 <!--last child-->
 <!-- including footer  -->
 <?php
 include("./includes/footer.php");
 ?>
</div>
 <!--javascript  link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>