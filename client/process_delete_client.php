<?php
include 'db_connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['client_id'])) {
    $client_id = $_GET['client_id'];

    // Perform deletion of the client based on the provided client_id
    $sql = "DELETE FROM Client WHERE client_id = $client_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Client deleted successfully');</script>";
       
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request or client ID not provided";
}

$conn->close();
?>
