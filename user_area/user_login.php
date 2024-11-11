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
    <title>User Login</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-5">
                    <h2 class="text-center mb-4">User Login</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- username field -->
                        <div class="mb-3">
                            <label for="user_username" class="form-label">User Name</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter Your User Name" autocomplete="off" required  name="user_username">
                        </div>
                        
                        <!-- password field -->
                        <div class="mb-3">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control" placeholder="Enter Your User Password" autocomplete="off" required name="user_password">
                        </div>
                       
                        <div class="mt-4">
                            <input type="submit" value="Login" class="btn btn-login btn-block" name="user_login">
                            <p class="small text-center mt-3 mb-0">Don't have an account? <a href="user_registration.php" class="registration-link">Register here</a></p>
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
<?php if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $user_ip=getIPAddress();
    
    $select_query="select * from `user_table`
     where username= '$user_username' ";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    // cart item
    $select_query_cart="select * from `cart_details`
     where ip_address= '$user_ip' ";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    
     if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
           
            if( $row_count==1 and $row_count_cart==0  ){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Succesfull')</script>";
              echo " <script>window.open('profile.php','_self')</script>";
              

            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Succesfull')</script>";
              echo " <script>window.open('payment.php','_self')</script>";

            }
        }else{
            echo "<script>alert('Password is wrong')</script>";
        }

    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}  ?>