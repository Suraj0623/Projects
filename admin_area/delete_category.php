<?php

if(isset($_GET['delete_category'])){
    $delete_id = $_GET['delete_category'];

    // Delete the product from the database
    $delete_query = "DELETE FROM `categories` WHERE category_id = $delete_id";
    $result = mysqli_query($con, $delete_query);

    if($result){
        
        echo "<script>alert('Category deleted successfully.')</script>";
        echo "<script>window.open('admin_panel.php','_self')</script>";
    } else {
        // Error occurred while deleting product
        echo "<script>alert('Error deleting product.')</script>";
        echo "<script>window.open('admin_panel.php','_self')</script>";
    }
}
?>
