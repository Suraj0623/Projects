<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 15px;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        .btn-register {
            background-color: #007bff;
            color: #fff;
            border-radius: 15px;
            transition: all 0.3s;
        }
        .btn-register:hover {
            background-color: #0056b3;
        }
        .login-link {
            color: #007bff;
            text-decoration: none;
        }
        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card p-5">
                    <h2 class="text-center mb-4">New User Registration</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- username field -->
                        <div class="mb-3">
                            <label for="user_username" class="form-label">User Name</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter Your User Name" autocomplete="off" required name="user_username">
                        </div>
                        <!-- email field -->
                        <div class="mb-3">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" id="user_email" class="form-control" placeholder="Enter Your User Email" autocomplete="off" required name="user_email">
                        </div>
                        <!-- image field -->
                        <div class="mb-3">
                            <label for="user_image" class="form-label">User Image</label>
                            <input type="file" id="user_image" class="form-control" required name="user_image">
                        </div>
                        <!-- password field -->
                        <div class="mb-3">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control" placeholder="Enter Your User Password" autocomplete="off" required name="user_password">
                        </div>
                        <!-- confirm password field -->
                        <div class="mb-3">
                            <label for="conf_user_password" class="form-label">Confirm Password</label>
                            <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required name="conf_user_password">
                        </div>
                        <!-- address field -->
                        <div class="mb-3">
                            <label for="user_address" class="form-label">Address</label>
                            <input type="text" id="user_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" required name="user_address">
                        </div>
                        <!-- contact field -->
                        <div class="mb-3">
                            <label for="user_contact" class="form-label">Contact</label>
                            <input type="tel" id="user_contact" class="form-control" placeholder="Enter Your Mobile Number" autocomplete="off" required name="user_contact">
                        </div>
                        <div class="mt-4">
                            <input type="submit" value="Register" class="btn btn-register btn-block" name="user_register">
                            <p class="small text-center mt-3 mb-0">Already have an account? <a href="user_login.php" class="login-link">Login here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<!-- php code -->
<?php
if(isset($_POST['user_register']))
{
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_temp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress($user_image_temp);
    
    // select query
    $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
       echo "<script>alert('username or email already present')</script>";

    }else if($user_password!=$conf_user_password){
        echo "<script>alert('password donot match')</script>";
    }
    else{
        // saving user images like product images
    move_uploaded_file($user_image_temp,"./user_images/$user_image");
    // insert query
    $insert_query="insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo "<script>alert('register successfully')</script>";
    }
    else{
       die(mysqli_error($con)); 
    }


    }
    // selecting cart items
    $select_cart_items="select * from`cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('Some Items Present In Cart')</script>";
        echo "<script>window.open('check_out.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }


}
?>
