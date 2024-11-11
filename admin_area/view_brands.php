<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Serial Number</th>
            <th>Brand Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php 
        $select_cat="select * from `brands`";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id=$row['brand_id'];
            $brand_name=$row['brand_name'];
        
        $number++;
        
        
        ?>
        <tr class="text-center">
            <td><?php echo $number ?></td>
            <td><?php echo $brand_name ?></td>
                <td><a href='admin_panel.php?edit_brand=<?php echo $brand_id ?>' class='edit-link'><i class="fa-regular fa-pen-to-square"></i></a></td>
                <td><a href='admin_panel.php?delete_brand=<?php echo $brand_id ?>' class='delete-link'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php 
        } 
        ?>
</tbody>
</table>