<?php
// Replace these variables with your actual database credentials
try {
    include 'db_connection.php';

    // SQL query
    $sql = "SELECT 
                Project.project_id,
                Project.project_name,
                Project.start_date AS project_start_date,
                Project.due_date AS project_due_date,
                Project.budget,
                Project.status AS project_status,
                Client.client_id AS client_id,
                Client.client_name,
                Client.address AS client_address,
                Client.contact_email,
                Client.contact_phone,
                Invoice.invoice_id,
                Invoice.issue_date AS invoice_issue_date,
                Invoice.due_date AS invoice_due_date,
                Invoice.amount
            FROM 
                Project
            INNER JOIN Client ON Project.client_id = Client.client_id
            LEFT JOIN Invoice ON Project.project_id = Invoice.project_id";

    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result(); // Get the result set

    // Display the data with relations
    echo "<table border='1'>";
    echo "<tr>
            <th>Project ID</th>
            <th>Project Name</th>
            <th>Client ID</th>
            <th>Client Name</th>
            <th>Invoice ID</th>
            <th>Issue Date</th>
            <th>Due Date</th>
            <th>Amount</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['project_id'] . "</td>";
        echo "<td>" . $row['project_name'] . "</td>";
        echo "<td>" . $row['client_id'] . "</td>";
        echo "<td>" . $row['client_name'] . "</td>";
        echo "<td>" . $row['invoice_id'] . "</td>";
        echo "<td>" . $row['invoice_issue_date'] . "</td>";
        echo "<td>" . $row['invoice_due_date'] . "</td>";
        echo "<td>" . $row['amount'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
