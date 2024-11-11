<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            overflow-x: hidden;
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
        .btn-login {
            background-color: #007bff;
            color: #fff;
            border-radius: 15px;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        .registration-link {
            color: #007bff;
            text-decoration: none;
        }
        .registration-link:hover {
            text-decoration: underline;
        }
        .img-fluid{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
                    <h2 class="text-center mb-4">Admin Login</h2>
                    <div class="col-lg-6">
                    <img src="../images/images.jpeg" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- username field -->
                        <div class="mb-3">
                            <label for="admin_username" class="form-label">Admin UserName</label>
                            <input type="text" id="admin_username" class="form-control" placeholder="Enter Your User Name" autocomplete="off" required  name="admin_username">
                        </div>
                        
                        <!-- password field -->
                        <div class="mb-3">
                            <label for="admin_password" class="form-label">Password</label>
                            <input type="password" id="admin_password" class="form-control" placeholder="Enter Your User Password" autocomplete="off" required name="admin_password">
                        </div>
                       
                        <div class="mt-4">
                            <input type="submit" value="Login" class="btn btn-login btn-block" name="admin_login">
                            <p class="small text-center mt-3 mb-0 fw-bold">Don't have an account? <a href="admin_registration.php" class="registration-link link-danger">Register here</a></p>
                        </div>
                    </form>
                    </div>
        
        </div>
    </div>

    <!-- Bootstrap bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php 
if(isset($_POST['admin_login'])){
    $admin_username=$_POST['admin_username'];
    $admin_password=$_POST['admin_password'];
    
    $select_query="select * from `admin_table`
     where admin_name= '$admin_username' ";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    
    
     if($row_count>0){
        $_SESSION['admin_username']=$admin_username;
        if(password_verify($admin_password,$row_data['admin_password'])){
           
            if( $row_count==1){
                $_SESSION['admin_username']=$admin_username;
                echo "<script>alert('Login Succesfull')</script>";
              echo " <script>window.open('admin_panel.php','_self')</script>";
              

            }
        }else{
            echo "<script>alert('Password is wrong')</script>";
        }

    }else{
        echo "<script>alert('Invalid Credentials')</script>";
        echo " <script>window.open('../index.php','_self')</script>";
    }
}  ?>