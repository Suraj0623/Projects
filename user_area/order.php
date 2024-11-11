
<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
   

    if(isset($_GET['user_id'])){
        $user_id=$_GET['user_id'];
        
    }

    // getting total items and total price of all items
    $_get_ip_address=getIPAddress();
    $total_price=0;
    $cart_query_price="select * from `cart_details` where ip_address='$_get_ip_address'";
    $result_cart_price=mysqli_query($con,$cart_query_price);
    $invoice_num=mt_rand();
    $status='pending';
    $count_products=mysqli_num_rows($result_cart_price);
    while($row_price=mysqli_fetch_array($result_cart_price)){
        $product_id=$row_price['product_id'];
        $select_product="select * from `products` where product_id=$product_id";
        $run_price=mysqli_query($con,$select_product);
        while($row_product_price=mysqli_fetch_array($run_price)){
            $product_price=array($row_product_price['product_price']);
            $product_value=array_sum($product_price);
            $total_price += $product_value;

        }
    }
    // getting quantity from cart
    $get_cart="select * from `cart_details`";
    $run_cart=mysqli_query($con,$get_cart);
    $get_item_quantity=mysqli_fetch_array($run_cart);
    $quantity=$get_item_quantity['quantity'];
    if($quantity == 0){
        $quantity=1;
        $total_price=$total_price;
    }else{
        $quantity=$quantity;
        $total_price=$total_price*$quantity;
    }

// data insertion in user_order db
   $insert_orders="insert into `user_orders` (user_id,amount_due,invoice_num,total_products,order_date,order_status) values ($user_id,$total_price,$invoice_num,$count_products,NOW(),'$status')";
   $result_query=mysqli_query($con,$insert_orders);
   if($result_query){
    echo" <script>alert('You order is successfully saved please confirm and pay to get your product')</script>";
    echo" <script>window.open('profile.php','_self')</script>";
   }

// orders pending table data insertion
$insert_pending_orders="insert into `order_pending` (user_id,invoice_num,product_id,quantity,order_status) values ($user_id,$invoice_num,$product_id,$quantity,'$status')";
$result_pending_orders=mysqli_query($con,$insert_pending_orders);

// deleting items from cart
$empty_cart="delete from `cart_details` where ip_address='$_get_ip_address'";
$result_delete=mysqli_query($con,$empty_cart);
    ?>