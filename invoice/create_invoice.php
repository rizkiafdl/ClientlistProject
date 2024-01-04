<!DOCTYPE html>
<html>
<head>
    <title>Create Project</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Create New Invoice</h2>
    <form method="post" action="process_create_invoice.php">
        
        <label for="issue_date">Issue Date:</label><br>
        <input type="date" id="issue_date" name="issue_date"><br>
        
        <label for="due_date">Due Date:</label><br>
        <input type="date" id="due_date" name="due_date"><br>
        
        <label for="amount">Budget:</label><br>
        <input type="number" step="0.01" id="amount" name="amount"><br>
        
        <label for="project_id">Client ID:</label><br>
        <select id="project_id" name="project_id">
            <?php
            include 'db_connection.php'; // Include your database connection file

            // Fetch existing client IDs from the Client table
            $sql = "SELECT project_id FROM project";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['project_id'] . "'>" . $row['project_id'] . "</option>";
                }
            } else {
                echo "<option value=''>No clients found</option>";
            }

            $conn->close();
            ?>
        </select><br>
        
        <input type="submit" name="submit" value="Create">
    </form>
</body>
</html>
