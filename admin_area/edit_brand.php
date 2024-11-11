<?php
if(isset($_GET['edit_brand'])){
 $edit_brand=$_GET['edit_brand'];
 
 $get_brands="select * from `brands` where brand_id=$edit_brand";
 $result=mysqli_query($con,$get_brands);
 $row=mysqli_fetch_assoc($result);
 $brand_name=$row['brand_name'];

}
if(isset($_POST['edit_brand'])){
    $bran_name=$_POST['brand_name'];
    $update_query="update `brands` set brand_name='$bran_name' where brand_id=$edit_brand ";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo"<script>alert('brand is Updated') </script>";
        echo"<script>window.open('./admin_panel.php?view_brand','_self') </script>";
    }
}
?>

<div class="container mt-5">
<h1 class="text-center text-success">Edit Brand</h1>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-outline text-center w-50 m-auto mb-4">
    <label for="brand_name" class="form-label " >Edit Brand</label>
    <input type="text" id="brand_name"  name="brand_name"  class="form-control" value="<?php echo $brand_name ?>" required>
</div>
<div class="form-outline text-center w-50 m-auto mb-4">
<input type="submit" value="Update brand" class="btn btn-info px-3 mb-3" name="edit_brand">
</div>
</form>
</div>