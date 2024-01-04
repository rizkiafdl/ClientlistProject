<?php
include 'db_connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_id = $_POST['client_id'];

    // Process the form data for updating client details
    $client_name = $_POST['client_name'];
    $address = $_POST['address'];
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];

    $update_sql = "UPDATE client SET client_name = '$client_name', address = '$address', contact_email = '$contact_email', contact_phone = '$contact_phone' WHERE client_id = $client_id";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Client details updated successfully');</script>";
    } else {
        echo "Error updating client details: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
