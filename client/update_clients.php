<!DOCTYPE html>
<html>
<head>
    <title>Update Client</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Update Client Details</h2>
    
    <?php
    include 'db_connection.php'; // Include your database connection file

    // Display existing client data in a table
    $sql = "SELECT * FROM client";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Existing Clients</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Client ID</th><th>Client Name</th><th>Address</th><th>Email</th><th>Phone</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["client_id"] . "</td>";
            echo "<td>" . $row["client_name"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["contact_email"] . "</td>";
            echo "<td>" . $row["contact_phone"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No clients found";
    }
    $conn->close();
    ?>

    <h3>Update Client Details</h3>
    <form method="post" action="process_update_client.php">
        <label for="client_id">Client ID:</label><br>
        <input type="number" id="client_id" name="client_id" required><br>

        <label for="client_name">Client Name:</label><br>
        <input type="text" id="client_name" name="client_name"><br>
        
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br>
        
        <label for="contact_email">Email:</label><br>
        <input type="email" id="contact_email" name="contact_email"><br>
        
        <label for="contact_phone">Phone:</label><br>
        <input type="text" id="contact_phone" name="contact_phone"><br>
        
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
