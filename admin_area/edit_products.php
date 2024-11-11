<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_name=$row['product_name'];
    $product_description=$row['product_description'];
    $product_keyword=$row['product_keyword'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_price=$row['product_price'];

    // fetching categories name
    $select_category="SELECT * FROM `categories` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_name=$row_category['category_name'];

    // fetching brand name
    $select_brand="SELECT * FROM `brands` where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_name=$row_brand['brand_name'];
}
?>
<div class="container mt-5">
<h1 class="text-center">Edit Products</h1>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_name" class="form-label" >Product Name</label>
    <input type="text" id="product_name" value="<?php echo $product_name ?>" name="product_name"  class="form-control" required>
</div>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_description" class="form-label" >Product Description</label>
    <input type="text" id="product_description" name="product_description" value="<?php echo $product_description ?>"  class="form-control" required>
</div>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_keyword" class="form-label" >Product keywords</label>
    <input type="text" id="product_keyword" name="product_keyword"  value="<?php echo $product_keyword ?>" class="form-control" required>
</div>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_category" class="form-label" >Product Category</label>
   <select name="product_category" class="form-select">
    <option value="<?php echo $category_name?>"><?php echo $category_name?></option>
    <?php
     $select_category_all="SELECT * FROM `categories`";
     $result_category_all=mysqli_query($con,$select_category_all);
    while( $row_category_all=mysqli_fetch_assoc($result_category_all)){
     $category_name=$row_category_all['category_name'];
     $category_id=$row_category_all['category_id'];
     echo "<option value='$category_id'>$category_name</option>";
    }
    ?>
    
   </select>
</div>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_brands" class="form-label" >Product Brands</label>
   <select name="product_brands" class="form-select">
   <option value='<?php echo $brand_id?>'><?php echo $brand_name ?></option>
    <?php
    $select_brand_all="SELECT * FROM `brands` ";
    $result_brand_all=mysqli_query($con,$select_brand_all);
    while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
    $brand_name=$row_brand_all['brand_name'];
    $brand_id=$row_brand_all['brand_id'];
    echo"<option value='$brand_id'>$brand_name</option>";
    }
    ?>
    
    
   </select>
</div>
  <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form_label">Product Image1</label>
                <div class="d-flex">
                <input type="file" name="product_image1" id="product_image1" class="form-control" required>
                <img src="./product_images/<?php echo $product_image1 ?>" alt=""  class="product_img">
</div>
            </div>
<div class="form-outline mb-4 w-50 m-auto ">
                <label for="product_image2" class="form_label">Product Image2</label>
                <div class="d-flex">
                <input type="file" name="product_image2" id="product_image2" class="form-control" required>
                <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_img">
</div>
            </div>
<div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form_label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"  value="<?php echo $product_price ?>"  placeholder="Enter Product Price" autocomplete="off" required>
            </div>
<div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="edit_product" class="btn btn-info mb-3 px-3" value="Update Product">
</div>
</form>
</div>
<!-- updating products -->
<?php 
  if(isset($_POST['edit_product'])){
    $product_name=$_POST['product_name'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $temp_image1=$_FILES['product_image1']['tmp_name'];

    $product_image2=$_FILES['product_image2']['name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];

    if($product_name=='' or $product_description=='' or $product_keyword=='' or $product_category=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2==''){
        echo"<script>alert('Please fill All Fields') </script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");

        // updating
        $update_product="update `products` set product_name='$product_name',product_description='$product_description',product_keyword='$product_keyword',category_id='$product_category',brand_id='$product_brand',product_price='$product_price',product_image1='$product_image1',product_image2='$product_image2', date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo"<script>alert('Product is Updated') </script>";
            echo"<script>window.open('admin_panel.php','_self') </script>";
        }

  }
}
?>