<?php
// Include the database connection file
include('../includes/connect.php');

// Check if the form is submitted
if(isset($_POST['update_status'])) {
    // Retrieve the order ID and new status from the form
    $order_id = $_POST['order_id'];
    $new_status = $_POST['new_status'];

    // Update the status of the order in the database
    $update_query = "UPDATE user_orders SET order_status='$new_status' WHERE order_id=$order_id";
    $update_result = mysqli_query($con, $update_query);

    if($update_result) {
        // Status updated successfully
        echo "Status updated successfully.";
    } else {
        // Error updating status
        echo "Error updating status: " . mysqli_error($con);
    }
} else {
    // Redirect or display an error message if the form was not submitted
    echo "Form submission error.";
}
?>
