<?php
include 'db_connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $invoice_id = $_POST['invoice_id'];
    $project_id = $_POST['project_id'];
    $issue_date = $_POST['issue_date'];
    $due_date = $_POST['due_date'];
    $amount = $_POST['amount'];

    // Perform validation on form inputs here

    // Perform database update
    $sql = "UPDATE invoice
     SET project_id = '$project_id',
      issue_date = '$issue_date'
      , due_date = '$due_date', 
      amount = '$amount' 
    WHERE invoice_id = '$invoice_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Invoice updated successfully');</script>";
    } else {
        echo "Error updating invoice: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
