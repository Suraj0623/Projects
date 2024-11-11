<?php
//including coonect file
// comment out because needded in userregistration if neccessary
// include('./includes/connect.php');


// getting products
function getproducts(){
  global $con;
  // getting specific brand and category
  //condition to check isset or not
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
      $select_query="select * from `products` order by rand() LIMIT 0,9";
      $result_query=mysqli_query($con,$select_query);
      // below only fetches first col from databse 
      // $row=mysqli_fetch_assoc($result_query);
      // echo $row['product_name'];
      // but we need all datas
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $product_description=$row['product_description'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card' >
<img src='./admin_area/product_images/$product_image1 'class='card-img-top' alt='$product_name'>
           <div class='card-body'>
  <h5 class='card-title'>$product_name</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>PRICE:$product_price/-</p>
  <a href='index.php?add_to_cart=$product_id ' class='btn btn-info'>Add To Cart</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
           </div>
        </div>
      </div>";
      }    
}
}
}
//above function may be copied and changes are made 
// getting all products 
function get_all_products(){
  global $con;
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
      $select_query="select * from `products` order by rand() ";
      $result_query=mysqli_query($con,$select_query);
      
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $product_description=$row['product_description'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card' >
<img src='./admin_area/product_images/$product_image1 'class='card-img-top' alt='$product_name'>
           <div class='card-body'>
  <h5 class='card-title'>$product_name</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>PRICE:$product_price/-</p>
  <a href='index.php?add_to_cart=$product_id ' class='btn btn-info'>Add To Cart</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
           </div>
        </div>
      </div>";
      }    
}
}
}

// getting unqiue category
function get_unique_category(){
  global $con;
  if(isset($_GET['category'])){
    $category_id=$_GET['category'];
      $select_query="select * from `products` where category_id=$category_id ";
      $result_query=mysqli_query($con,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
        echo"<h1 class='text-center text-danger'>No available products for this categories</h1>";
      }
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $product_description=$row['product_description'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card' >
<img src='./admin_area/product_images/$product_image1 'class='card-img-top' alt='$product_name'>
           <div class='card-body'>
  <h5 class='card-title'>$product_name</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>PRICE:$product_price/-</p>
  <a href='index.php?add_to_cart=$product_id ' class='btn btn-info'>Add To Cart</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
           </div>
        </div>
      </div>";
      }    
}
}
//getting unqiue brands
function get_unique_brand(){
  global $con;
  if(isset($_GET['brand'])){
    $brand_id=$_GET['brand'];
      $select_query="select * from `products` where brand_id=$brand_id ";
      $result_query=mysqli_query($con,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
        echo"<h1 class='text-center text-danger'>Service has been cancelled for this brand</h1>";
      }
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $product_description=$row['product_description'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card' >
<img src='./admin_area/product_images/$product_image1 'class='card-img-top' alt='$product_name'>
           <div class='card-body'>
  <h5 class='card-title'>$product_name</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>PRICE:$product_price/-</p>
  <a href='index.php?add_to_cart=$product_id ' class='btn btn-info'>Add To Cart</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
           </div>
        </div>
      </div>";
      }    
}
}
// dispalying brands in sidenav
function getbrand(){
  global $con ;
  $select_brand="select * from `brands`";
      $result_brand=mysqli_query($con,$select_brand);
      while($row_data=mysqli_fetch_assoc($result_brand))
     { 
        $brand_name=$row_data['brand_name'];
        $brand_id=$row_data['brand_id'];
        echo "<li class='nav-item'>
        <a href='index.php?brand=$brand_id'class='nav-link text-light'>$brand_name</a>
      </li>";
      }
}
// displaying categories
function getcategory(){
  global $con;
  $select_categories="select * from `categories`";
      $result_categories=mysqli_query($con,$select_categories);
      while($row_data=mysqli_fetch_assoc($result_categories))
     { 
        $category_name=$row_data['category_name'];
        $category_id=$row_data['category_id'];
        echo "<li class='nav-item'>
        <a href='index.php?category=$category_id'class='nav-link text-light'>$category_name</a>
      </li>";
      }
}

// searching products function
function search_product(){
  global $con;
  if(isset($_GET['search_data_product'])){
    $user_search_data=$_GET['search_data'];
      $search_query="select * from `products` where product_keyword like'%$user_search_data%'";
      $result_query=mysqli_query($con,$search_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
        echo"<h1 class='text-center text-danger'>ERROR!!! Search not Founded</h1>";
      }
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $product_description=$row['product_description'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card' >
<img src='./admin_area/product_images/$product_image1 'class='card-img-top' alt='$product_name'>
           <div class='card-body'>
  <h5 class='card-title'>$product_name</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>PRICE:$product_price/-</p>
  <a href='index.php?add_to_cart=$product_id ' class='btn btn-info'>Add To Cart</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
           </div>
        </div>
      </div>";
      }    
}
}
// view details function
function view_details(){
  global $con;
  // condition to check isset or not
  if(isset($_GET['product_id'])){
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
      $product_id=$_GET['product_id'];
      $select_query="select * from `products` where product_id=$product_id ";
      $result_query=mysqli_query($con,$select_query);
      
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $product_description=$row['product_description'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_price=$row['product_price'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card' >
<img src='./admin_area/product_images/$product_image1 ' class='card-img-top' alt='$product_name'>
           <div class='card-body'>
  <h5 class='card-title'>$product_name</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>PRICE:$product_price/-</p>
  <a href='index.php?add_to_cart=$product_id ' class='btn btn-info'>Add To Cart</a>
  <a href='index.php' class='btn btn-secondary'>Go Home</a>
           </div>
        </div>
      </div>
      
      <div class='col-md-8'>
        <div class='row'>
            <div class='col-md-12'>
                <h3 class='text-center text-info mb-4'>More on products</h3>
            </div>
            <div class='col-md-6'>
            <img src='./admin_area/product_images/$product_image2'class='card-img-top ' alt='$product_name'>             
            </div>
            
        </div>
    </div>";
      }    
}
}
  }
}
// getting ip function (code copied from browser)
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;


// cart function
function cart(){
if(isset($_GET['add_to_cart'])){
  global $con;
  $ip = getIPAddress();  
  $get_product_id=$_GET['add_to_cart'];
  $select_query="select * from `cart_details` where ip_address= '$ip' and product_id=$get_product_id";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows>0){
        echo"<script>alert('Item Already Present In Cart') </script>";
        echo"<script>window.open('index.php','_self')</script>";
      }else{
        $insert_query="insert into `cart_details`(product_id,ip_address,quantity) values('$get_product_id','$ip',0)";
        $result_query=mysqli_query($con,$insert_query);
        echo"<script>alert('Item is inserted into cart')</script>";
        echo"<script>window.open('index.php','_self')</script>";
      }
}
}
// function to get cart item number
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress();  
    $select_query="select * from `cart_details` where ip_address= '$ip'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  
  }else{
    global $con;
    $ip = getIPAddress();  
    $select_query="select * from `cart_details` where ip_address= '$ip'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
        }
        echo $count_cart_items;
  }
  // total price calculation
  function total_cart_price(){
    global $con;
    $ip = getIPAddress();  
    $total_price=0;
  $cart_query="select * from `cart_details` where ip_address= '$ip' ";
  $result=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['product_id'];
    $select_products="select * from `products` where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products)){
      $product_price=array($row_product_price['product_price']);//[400,200]
      $product_value=array_sum($product_price);
      $total_price+=$product_value;
    }
  }
  echo $total_price;
  }


  // get user order details
  function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="select * from `user_table` where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
      $user_id=$row_query['user_id'];
      if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
          $get_orders="select * from `user_orders` where user_id=$user_id and order_status='pending'";
          $result_orders_query=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows($result_orders_query);
          if($row_count>0){
        echo   " <h3 class='text-center text-success mt-4 mb-3'>You have <span class='text-danger'> $row_count </span>Pending Orders</h3>
       <p class='text-center'> <a href='profile.php?my_orders' class='text-dark'> Orders details</a></p>";
          }else{
            echo   " <h3 class='text-center text-success mt-4 mb-3'>You have zero(0) Pending Orders</h3>
       <p class='text-center'> <a href='../index.php' class='text-dark'> Explore Products</a></p>";
          }
        }
      }
      }

    }

  }
?>