<?php
include 'db_connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['invoice_id'])) {
        $invoice_id = $_POST['invoice_id'];

        // Validate and sanitize the input if needed

        // Perform the deletion
        $sql = "DELETE FROM invoice WHERE invoice_id = $invoice_id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Invoice deleted successfully');</script>";
            // Redirect to a suitable page or display a success message
            header("Location: delete_invoice.php");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Invoice ID is not set";
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
