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
    <title>Cart details</title>
    <!--bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!--font awesome  link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!--css link -->
     <link rel="stylesheet" href="style.css">

     <style>
      .cart_img{
        width: 70px;
        height: 70px;
        object-fit: contain;
      }
     </style>
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
          <?php
        if(isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/profile.php'>My Account</a>
          </li>";

        }
        ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true">Cart <sup><?php cart_item(); ?></sup></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php"><i class="fa fa-phone-square" aria-hidden="true"></i>Contact US</a>
        </li>
        <form class="d-flex" action="search_product.php" method="get">
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
   
    <!-- to switch logout and login done in all wher e welcome guest nav is found -->
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
<div class="container">
    <div class="row">
      <form action="" method="post">

        <table class="table table-bordered text-center">
              <!-- to display dynamic data inside cart table -->
              <?php
              global $con;
              $ip = getIPAddress();  
              $total_price=0;
              $cart_query="select * from `cart_details` where ip_address= '$ip' ";
              $result=mysqli_query($con,$cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count>0){
                echo" <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Product Image</th>
                  <th>Quantity</th>
                  <th>Product Price</th>
                  <th>Remove</th>
                  <th colspan='2'>Operations</th>
                </tr>
              </thead>
              <tbody>";

              while($row=mysqli_fetch_assoc($result)){
                $product_id=$row['product_id'];
                $select_products="select * from `products` where product_id='$product_id'";
                $result_products=mysqli_query($con,$select_products);
                while($row_product_price=mysqli_fetch_array($result_products)){                
                  $product_price=array($row_product_price['product_price']);//[400,200]
                  $price_table=$row_product_price['product_price'];
                  $product_name=$row_product_price['product_name'];
                  $product_image1=$row_product_price['product_image1'];
                  $product_values=array_sum($product_price);
                  $total_price+=$product_values;    
                  ?>
                <tr>
                  <td><?php echo $product_name?></td>
                  <td><img src="./admin_area/product_images/<?php echo $product_image1?>" alt="product_image" class="cart_img" ></td>
                  <td><input type="text" name="quantity" class="form-input w-50"></td>
                  <?php
                  $ip = getIPAddress();  
                   
                  if(isset($_POST['update_cart'])){
                    $quantities=$_POST['quantity'];
                    $update_cart="update `cart_details` set quantity=$quantities where ip_address='$ip'";
                    $result_products_quantity=mysqli_query($con,$update_cart);
                    $total_price=$price_table*$quantities;
                  }
                  ?>
                  <td><?php echo $price_table ?>/-</td>
                  <td><input type="checkbox" name="removeitem[]" value="<?php 
                  echo $product_id
                  
                  ?>"></td>
                  <td>
                   
                    <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart" >
                    <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove Item </button> -->
                    <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart" >
                  </td>
                </tr>
                <?php }}}
                else{
                 echo "<h2 class='text-center text-danger text-bold'> Cart is empty</h2>";
                }
                ?>
            </tbody>
        </table>
        <!-- total price -->
        <div class="d-flex mb-5">
        <?php
              $ip = getIPAddress();  
              $cart_query="select * from `cart_details` where ip_address= '$ip' ";
              $result=mysqli_query($con,$cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count>0){
                echo"<h4 class='px-3'>Total Price: <strong class='text-info'> $total_price</strong></h4>
                <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping' >
                <button class='bg-secondary px-3 py-2 border-0 '><a href='./user_area/check_out.php' class='text-light text-decoration-none'>Check Out </a></button>";
              }
              else{
                echo"<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping' >";
              }
              if(isset($_POST['continue_shopping'])){
               echo "<script>window.open('index.php','_self')</script>";
              }
              ?>
              
        </div>
      </div>
    </div>
    
  </form>
<!-- functions to remove item -->
<?php 
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
  foreach($_POST['removeitem'] as $remove_id){
    echo $remove_id;
    $delete_query="delete from `cart_details` where product_id=$remove_id";
    $run_delete=mysqli_query($con,$delete_query);
    if($run_delete){
      echo "<script>window.open('cart.php',_'self')</script>";
    }

  }
  }
}
echo $remove_item=remove_cart_item();

?>




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