<?php
include 'db_connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST['project_id'];

    // Delete the project from the database
    $sql = "DELETE FROM Project WHERE project_id = $project_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Project deleted successfully');</script>";
    } else {
        echo "Error deleting project: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
