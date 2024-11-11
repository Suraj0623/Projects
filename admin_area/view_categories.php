<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Serial Number</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
        $select_cat="select * from `categories`";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id=$row['category_id'];
            $category_name=$row['category_name'];
        
        $number++;
        
        
        ?>
        <tr class="text-center">
            <td><?php echo $number ?></td>
            <td><?php echo $category_name ?></td>
                <td><a href='admin_panel.php?edit_category=<?php echo $category_id ?>' class='edit-link'><i class="fa-regular fa-pen-to-square"></i></a></td>
                <td><a href='admin_panel.php?delete_category=<?php echo $category_id ?>' class='delete-link'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }?>
</tbody>
</table>
