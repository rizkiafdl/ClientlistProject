<?php
include 'db_connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $client_name = $_POST['client_name'];
    $address = $_POST['address'];
    $contact_email = $_POST['contact_email'];
    $contact_phone = $_POST['contact_phone'];

    // Validate and sanitize inputs (ensure they are in the correct format)

    // Perform database insertion
    $sql = "INSERT INTO Client (client_name, address, contact_email, contact_phone)
            VALUES ('$client_name', '$address', '$contact_email', '$contact_phone')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Client created successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
