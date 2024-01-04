<!DOCTYPE html>
<html>
<head>
    <title>Delete Invoice</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Delete Invoice</h2>
    <?php
    include 'db_connection.php'; // Include your database connection file

    // Fetch all invoices from the database
    $sql = "SELECT * FROM invoice";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display invoices in a table
        echo "<h3>Current Invoices</h3>";
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
        echo "No invoices found";
    }
    $conn->close();
    ?>

    <form method="post" action="process_delete_invoice.php">
        <label for="invoice_id">Invoice ID to delete:</label>
        <input type="number" id="invoice_id" name="invoice_id">
        <input type="submit" value="Delete">
    </form>
</body>
</html>
