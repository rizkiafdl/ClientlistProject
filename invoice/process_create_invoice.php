<?php
include 'db_connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
   
    $issue_date = $_POST['issue_date'];
    $due_date = $_POST['due_date'];
    $amount = $_POST['amount'];
    $project_id = $_POST['project_id'];

    // Validate and sanitize inputs (ensure they are in the correct format)

    // Perform database insertion
    $sql = "INSERT INTO invoice (issue_date, due_date, amount,  project_id)
            VALUES ('$issue_date', '$due_date', '$amount',  $project_id)";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Project created successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
