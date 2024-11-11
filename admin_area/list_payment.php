<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <?php
        $get_orders = "SELECT * FROM `user_payments` ";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No new Orders</h2>";
        } else {
            echo "<tr>
                    <th>Serial Number</th>
                    <th>Invoice Number</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Order Date</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";

            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $payment_id = $row_data['payment_id'];
                $order_id = $row_data['order_id'];
                $amount = $row_data['amount'];
                $invoice_number = $row_data['invoice_number'];
                $payment_mode = $row_data['payment_mode'];
                $order_date = $row_data['date'];
                $number++;
                echo "<tr class='text-center'>
                        <td>$number</td>
                        <td>$invoice_number</td>
                        <td>$amount</td>
                        <td>$payment_mode</td>
                        <td>$order_date</td>
                        <td><a href='admin_panel.php?delete_payment=$payment_id' class='delete-link'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>";
            }
        }
        ?>
    </tbody>
</table>
