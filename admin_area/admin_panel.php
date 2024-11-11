<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
      <!--bootstrap link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      
        <!--font awesome  link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
      <!-- css link -->
      <link rel="stylesheet" href="./style.css">
      <style>
        body{
          overflow-x:hidden ;
        }
        .product_img{
          width: 15%;
          height: 15%;
          object-fit: contain;
        }
        .logo_name{
          width: 10%;
          height: 10%;
          object-fit: contain;
        }
        .logo{
          width: 50%;
          height: 50%;
          object-fit: contain;
        }
       
        
      </style>
</head>
<body>
  <!-- navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="conatiner-fluid">
        <img src="../images/logo.png" alt="logo_name" class="logo">
        <nav class="navbar navbar-expand-lg ">
          <ul class="navbar-nav">
            <li class="nav-item">
            <?php
      if(!isset($_SESSION['admin_username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>WELCOME GUEST</a>
        </li>"; 
       }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>WELCOME " . $_SESSION['admin_username']. " </a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='../index.php'> View Products </a>
        </li>";
       
       }
   if(!isset($_SESSION['admin_username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='admin_login.php'>Log In</a>
  </li>";
   }else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='admin_logout.php'>Log Out</a>
  </li>";
   
   }
    
    ?>
            
       
          </ul>

        </nav>
      </div>
    </nav>
    <!-- second child -->
    <div class="bg-light">
      <h3 class="text-center p-2">Manage details</h3>
    </div>
    <!-- third child -->
    <div class="row">
      <div class="col-md-12 bg-secondary p-1 d-flex align-iitems-center">
        <div class="p-3">
          <a href="#"><img src="../images/download.jpeg" alt="" class="admin_image"></a>
          <p class="text-center text-light"><?php 
            if(isset($_SESSION['admin_username'])) {
                echo $_SESSION['admin_username'];
            } else {
                echo "Admin"; 
            }
            ?>
            </p>
        </div>
        <div class="button text-center">
        <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">insert product</a></button>
        <button><a href="admin_panel.php?view_products" class="nav-link text-light bg-info my-1">view product</a></button>
        <button><a href="admin_panel.php?insert_category" class="nav-link text-light bg-info my-1">insert categories</a></button>
        <button><a href="admin_panel.php?view_categories" class="nav-link text-light bg-info my-1">view categories</a></button>
        <button><a href="admin_panel.php?insert_brand" class="nav-link text-light bg-info my-1">insert brand</a></button>
        <button><a href="admin_panel.php?view_brands" class="nav-link text-light bg-info my-1">view brand</a></button>
        <button><a href="admin_panel.php?list_orders" class="nav-link text-light bg-info my-1">All order</a></button>
        <button><a href="admin_panel.php?list_payment" class="nav-link text-light bg-info my-1">All payment</a></button>
        <button><a href="admin_panel.php?list_user" class="nav-link text-light bg-info my-1">user list</a></button>
        <button><a href="admin_logout.php" class="nav-link text-light bg-info my-1">logout</a></button>
        </div>
      </div>
    </div>
  
    <!-- fourth child -->
    <div class="container my-2">
     <?php
     if(isset($_GET['insert_category'])){
      include('insert_categories.php');
     }
     if(isset($_GET['insert_brand'])){
      include('insert_brands.php');
     }
     if(isset($_GET['view_products'])){
      include('view_products.php');
     }
     if(isset($_GET['edit_products'])){
      include('edit_products.php');
     }
     if(isset($_GET['delete_products'])){
      include('delete_products.php');
     }
     if(isset($_GET['view_categories'])){
      include('view_categories.php');
     }
     if(isset($_GET['view_brands'])){
      include('view_brands.php');
     }
     if(isset($_GET['edit_category'])){
      include('edit_category.php');
     }
     if(isset($_GET['edit_brand'])){
      include('edit_brand.php');
     }
     if(isset($_GET['delete_category'])){
      include('delete_category.php');
     }
     if(isset($_GET['delete_brand'])){
      include('delete_brand.php');
     }
     if(isset($_GET['list_orders'])){
      include('list_orders.php');
     }
     if(isset($_GET['delete_order'])){
      include('delete_order.php');
     }
     if(isset($_GET['list_payment'])){
      include('list_payment.php');
     }
     if(isset($_GET['delete_payment'])){
      include('delete_payment.php');
     }
     if(isset($_GET['list_user'])){
      include('list_user.php');
     } 
     if(isset($_GET['delete_user'])){
      include('delete_user.php');
     }
     
     
     ?>
    </div>


    <!--last child-->
    <?php
 include("../includes/footer.php");
 ?>

  </div>
    
 <!--javascript  link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</body>
</html>