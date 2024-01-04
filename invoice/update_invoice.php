<!DOCTYPE html>
<html>
<head>
    <title>Update invoice</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Update Invoice</h2>

    <?php
    include 'db_connection.php'; // Include your database connection file

    // Fetch all invoices from the database
    $sql = "SELECT * FROM invoice";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display invoices in a table
        echo "<h3>Current invoices</h3>";
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

    // Offer an option to update specific invoice details
    if(isset($_GET['invoice_id'])) {
        $invoice_id = $_GET['invoice_id'];

        // Fetch invoice details based on selected invoice_id
        $sql_specific = "SELECT * FROM invoice WHERE invoice_id = $invoice_id";
        $result_specific = $conn->query($sql_specific);

        if ($result_specific->num_rows > 0) {
            // Display form to update specific invoice details
            $row = $result_specific->fetch_assoc();
            ?>
            <h3>Update invoice</h3>
            <form method="post" action="process_update_invoice.php">
                <input type="hidden" name="invoice_id" value="<?php echo $row['invoice_id']; ?>">
                Invoice ID: <input type="text" name="invoice_id" value="<?php echo $row['invoice_id']; ?>"><br>
                Project ID: <input type="number" name="project_id" value="<?php echo $row['project_id']; ?>"><br>
                Issue Date: <input type="date" name="issue_date" value="<?php echo $row['issue_date']; ?>"><br>
                Due Date: <input type="date" name="due_date" value="<?php echo $row['due_date']; ?>"><br>
                Amount: <input type="number" step="0.01" name="amount" value="<?php echo $row['amount']; ?>"><br>
                <input type="submit" name="submit" value="Update">
            </form>
            <?php
        } else {
            echo "No invoice found with ID: $invoice_id";
        }
    } else {
        echo "<h3>Select a invoice ID to Update:</h3>";
        ?>
        <form method="get" action="update_invoice.php">
            <label for="invoice_id">invoice ID:</label>
            <input type="number" id="invoice_id" name="invoice_id">
            <input type="submit" value="Update">
        </form>
        <?php
    }

    $conn->close();
    ?>
</body>
</html>
