<?php
include 'db_connection.php'; // Include your database connection file

// Fetch all clients from the database
$sql = "SELECT * FROM Client";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display clients in a table
    echo "<h2>Client List</h2>";
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
