<style>
   
</style>
<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <?php
        $get_orders = "SELECT * FROM `user_table` ";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h2 class='bg-danger text-center mt-5'>No new Orders</h2>";
        } else {
            echo "<tr>
                    <th>Serial Number</th>
                    <th>Username</th>
                    <th>User Email</th>
                    <th>User Image</th>
                    <th>User Address</th>
                    <th>User Mobile</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $username = $row_data['username'];
                $user_id = $row_data['user_id'];
                $user_email = $row_data['user_email'];
                $user_ip = $row_data['user_ip'];
                $user_address = $row_data['user_address'];
                $user_image = $row_data['user_image'];
                $user_mobile = $row_data['user_mobile'];
                $number++;
                echo "<tr class='text-center'>
                        <td>$number</td>
                        <td>$username</td>
                        <td>$user_email</td>
                        <td><img src='../user_area/user_images/$user_image' alt='' class='product_img'></td>
                        <td>$user_address</td>
                        <td>$user_mobile</td>
                        <td><a href='admin_panel.php?delete_user=$user_id' class='delete-link'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>";
            }
        }
        ?>
        
    </tbody>
    
</table>
