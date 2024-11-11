<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_name = $_POST['product_name'];
    $product_description = $_POST['description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // for accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    // accessing img temporary(tmp) name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];

    // File upload directory
    $upload_dir = "./product_images/";

    // checking empty conditions
    if($product_name == '' || $product_description == '' || $product_keyword == '' || $product_category == '' || $product_brands == '' || $product_price == '' || $product_image1 == '' || $product_image2 == ''){
        echo "<script>alert('Please fill All Fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, $upload_dir . $product_image1);
        move_uploaded_file($temp_image2, $upload_dir . $product_image2);

        // insert query using prepared statements
        $stmt = $con->prepare("INSERT INTO `products` (product_name, product_description, product_keyword, category_id, brand_id, product_image1, product_image2, product_price, date, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)");
        $stmt->bind_param("sssiissds", $product_name, $product_description, $product_keyword, $product_category, $product_brands, $product_image1, $product_image2, $product_price, $product_status);

        if($stmt->execute()){
            echo "<script>alert('Successfully Inserted Product')</script>";
            echo "<script>window.open('admin_panel.php','_self')</script>";
        } else {
            echo "<script>alert('Error: Could not insert product')</script>";
        }
        $stmt->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
      <!--bootstrap link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!--font awesome  link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
      <!-- css link -->
      <link rel="stylesheet" href="./style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- product name -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_name" class="form_label">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" autocomplete="off" required>
            </div>
            <!-- product description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form_label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required>
            </div>
            <!-- product keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form_label">Product keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product keywords" autocomplete="off" required>
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="" >Select A category</option>
                    <?php
                     $select_query="Select * from `categories`";
                     $result_query=mysqli_query($con,$select_query);
                     while($row=mysqli_fetch_assoc($result_query)){
                        $category_name=$row['category_name'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_name</option>";
                     }
                     
                     ?>
                </select>
            </div>
            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select A Brand</option>
                    <?php
                     $select_query="Select * from `brands`";
                     $result_query=mysqli_query($con,$select_query);
                     while($row=mysqli_fetch_assoc($result_query)){
                        $brand_name=$row['brand_name'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_name</option>";
                     }
                     
                     ?>
                </select>
            </div>
             <!-- product Image1 -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form_label">Product Image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required>
            </div>
            <!-- product Image2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form_label">Product Image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required>
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form_label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required>
            </div>
            <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            
        </form>

    </div>


   <!--javascript  link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>  
</body>
</html>