<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
        .img-fluid{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <div class="row justify-content-center align-items-center">
                    <h2 class="text-center mb-5">Admin Registration</h2>
                    
                        <div class="col-lg-6">
                            <img src="../images/images.jpeg" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-6">
                        <form action="" method="post" enctype="multipart/form-data">
                        <!-- username field -->
                        <div class="mb-4 form-outline">
                            <label for="user_username" class="form-label">User Name</label>
                            <input type="text" id="admin_name" class="form-control" placeholder="Enter Your User Name" autocomplete="off" required name="admin_name">
                        </div>
                        <!-- email field -->
                        <div class="mb-4 form-outline">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" id="admin_email" class="form-control" placeholder="Enter Your User Email" autocomplete="off" required name="admin_email">
                        </div>
                       
                        <!-- password field -->
                        <div class="mb-4 form-outline">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="admin_password" class="form-control" placeholder="Enter Your User Password" autocomplete="off" required name="admin_password">
                        </div>
                        <!-- confirm password field -->
                        <div class="mb-4 form-outline">
                            <label for="conf_user_password" class="form-label">Confirm Password</label>
                            <input type="password" id="conf_admin_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required name="conf_admin_password">
                        </div>
                        
                        <div class="mt-4">
                            <input type="submit" value="Register" class="btn btn-register btn-block" name="admin_register">
                            <p class="small text-center mt-3 mb-0 fw-bold">Already have an account? <a href="admin_login.php" class="login-link link-danger">Login here</a></p>
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
if(isset($_POST['admin_register']))
{
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $conf_admin_password=$_POST['conf_admin_password'];
    
    // select query
    $select_query="Select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
       echo "<script>alert('name or email already present')</script>";

    }else if($admin_password!=$conf_admin_password){
        echo "<script>alert('password donot match')</script>";
    }
    else{
    // insert query
    $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) values('$admin_name','$admin_email','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo "<script>alert('register successfully')</script>";
        echo " <script>window.open('admin_login.php','_self')</script>";
    }
    else{
       die(mysqli_error($con)); 
    }


    }
   

}
?>

