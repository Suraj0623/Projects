<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Options</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        $user_ip = getIPAddress();
        $get_user = "SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
        $result = mysqli_query($con, $get_user);
        $run_query = mysqli_fetch_array($result);
        $user_id = $run_query['user_id'];
    ?>
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6 payment-img">
            <h1 class="text-center bg-info">Pay Online Now</h1>
                <a href="https://www.imepay.com.np/#/" target="_blank"><img src="../images/ime.png" alt="IME Pay"></a>
                <a href="https://khalti.com/" target="_blank"><img src="../images/khalti.png" alt="Khalti"></a>
                <a href="https://www.ipay.com.np" target="_blank"><img src="../images/ipay.png" alt="iPay"></a>
                <a href="https://prabhupay.com/" target="_blank"><img src="../images/prabhu.jpeg" alt="Prabhu Pay"></a>
                <a href="https://esewa.com.np/#/home" target="_blank"><img src="../images/esewa.png" alt="eSewa"></a>
            </div>
            
            <div class="col-md-6">
                
                <a href="order.php?user_id=<?php echo $user_id?>" class="text-center"><h2>Pay Later</h2></a>
            </div>

            
            
        </div>
    </div>

    <!-- Bootstrap Bundle JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
