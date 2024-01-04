<?php
include 'db_connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $project_name = $_POST['project_name'];
    $start_date = $_POST['start_date'];
    $due_date = $_POST['due_date'];
    $budget = $_POST['budget'];
    $status = $_POST['status'];
    $client_id = $_POST['client_id'];

    // Validate and sanitize inputs (ensure they are in the correct format)

    // Perform database insertion
    $sql = "INSERT INTO Project (project_name, start_date, due_date, budget, status, client_id)
            VALUES ('$project_name', '$start_date', '$due_date', '$budget', '$status', $client_id)";

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
