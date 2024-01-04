<!DOCTYPE html>
<html>
<head>
    <title>View Projects</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>View Projects</h2>
    <?php
    include 'db_connection.php'; // Include your database connection file

    // Fetch projects from the database
    $sql = "SELECT * FROM Project";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display projects in a table
        echo "<table border='1'>";
        echo "<tr><th>Project ID</th><th>Project Name</th><th>Start Date</th><th>Due Date</th><th>Budget</th><th>Status</th><th>Client ID</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["project_id"] . "</td>";
            echo "<td>" . $row["project_name"] . "</td>";
            echo "<td>" . $row["start_date"] . "</td>";
            echo "<td>" . $row["due_date"] . "</td>";
            echo "<td>" . $row["budget"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td>" . $row["client_id"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No projects found";
    }

    $conn->close();
    ?>
</body>
</html>
