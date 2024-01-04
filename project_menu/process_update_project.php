<?php
include 'db_connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST['project_id'];
    $project_name = $_POST['project_name'];
    $start_date = $_POST['start_date'];
    $due_date = $_POST['due_date'];
    $budget = $_POST['budget'];
    $status = $_POST['status'];
    $client_id = $_POST['client_id'];

    // Update project details in the database
    $sql = "UPDATE Project SET 
                project_name = '$project_name',
                start_date = '$start_date',
                due_date = '$due_date',
                budget = '$budget',
                status = '$status',
                client_id = '$client_id'
            WHERE project_id = $project_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Project updated successfully');</script>";
    } else {
        echo "Error updating project: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
