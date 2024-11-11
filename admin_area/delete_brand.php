<?php

if(isset($_GET['delete_brand'])){
    $delete_id = $_GET['delete_brand'];

    // Delete the product from the database
    $delete_query = "DELETE FROM `brands` WHERE brand_id = $delete_id";
    $result = mysqli_query($con, $delete_query);

    if($result){
        
        echo "<script>alert('Brand deleted successfully.')</script>";
        echo "<script>window.open('admin_panel.php','_self')</script>";
    } else {
        // Error occurred while deleting product
        echo "<script>alert('Error deleting product.')</script>";
        echo "<script>window.open('admin_panel.php','_self')</script>";
    }
}
?>
