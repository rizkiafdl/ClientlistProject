<!DOCTYPE html>
<html>
<head>
    <title>Delete Client</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Delete Client</h2>
    <?php
    include 'db_connection.php'; // Include your database connection file

    // Fetch all clients from the database
    $sql = "SELECT * FROM Client";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display clients in a table with a delete link for each
        echo "<h3>Current Clients</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Client ID</th><th>Client Name</th><th>Address</th><th>Email</th><th>Phone</th><th>Action</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["client_id"] . "</td>";
            echo "<td>" . $row["client_name"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["contact_email"] . "</td>";
            echo "<td>" . $row["contact_phone"] . "</td>";
            echo "<td><a href='process_delete_client.php?client_id=" . $row["client_id"] . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No clients found";
    }
    $conn->close();
    ?>
</body>
</html>
