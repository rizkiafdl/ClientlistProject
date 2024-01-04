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
    $sql = "SELECT * FROM invoice";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display projects in a table
        echo "<table border='1'>";
        echo "<tr><th>Invoice ID</th><th>Project ID</th><th>Issue Date</th><th>Due Date</th><th>Amount</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["invoice_id"] . "</td>";
            echo "<td>" . $row["project_id"] . "</td>";
            echo "<td>" . $row["issue_date"] . "</td>";
            echo "<td>" . $row["due_date"] . "</td>";
            echo "<td>" . $row["amount"] . "</td>";
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
