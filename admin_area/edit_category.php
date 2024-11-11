<?php
if(isset($_GET['edit_category'])){
 $edit_category=$_GET['edit_category'];
 
 $get_category="select * from `categories` where category_id=$edit_category";
 $result=mysqli_query($con,$get_category);
 $row=mysqli_fetch_assoc($result);
 $category_name=$row['category_name'];

}
if(isset($_POST['edit_cat'])){
    $cat_name=$_POST['category_name'];
    $update_query="update `categories` set category_name='$cat_name' where category_id=$edit_category ";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo"<script>alert('Category is Updated') </script>";
        echo"<script>window.open('./admin_panel.php?view_category','_self') </script>";
    }
}
?>




<div class="container mt-3">
<h1 class="text-center text-success">Edit Category</h1>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-outline text-center w-50 m-auto mb-4">
    <label for="category_name" class="form-label " >Category Name</label>
    <input type="text" id="category_name"  name="category_name"  class="form-control" required value="<?php echo $category_name ?>">
   
</div>
<div class="form-outline text-center w-50 m-auto mb-4">
<input type="submit" value="Update Category" class="btn btn-info px-3 mb-3" name="edit_cat">
</div>
</form>
</div>