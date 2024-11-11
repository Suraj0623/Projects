<?php
$con = mysqli_connect('localhost', 'root', '', 'mystore');

// Check connection
if (!$con) {
    // If connection fails, print an error message and terminate the script
    die("Connection failed: " . mysqli_connect_error());
}
//  else {
//     // If connection succeeds, print a success message
//     echo "Connection successful";
// }

// Close the connection (optional)
// mysqli_close($con);
?>
