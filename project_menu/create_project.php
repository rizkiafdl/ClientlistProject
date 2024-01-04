<!DOCTYPE html>
<html>
<head>
    <title>Create Project</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Create New Project</h2>
    <form method="post" action="process_create_project.php">
        <label for="project_name">Project Name:</label><br>
        <input type="text" id="project_name" name="project_name"><br>
        
        <label for="start_date">Start Date:</label><br>
        <input type="date" id="start_date" name="start_date"><br>
        
        <label for="due_date">Due Date:</label><br>
        <input type="date" id="due_date" name="due_date"><br>
        
        <label for="budget">Budget:</label><br>
        <input type="number" step="0.01" id="budget" name="budget"><br>
        
        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="Done">Done</option>
            <option value="Undone">Undone</option>
            <option value="Ongoing">Ongoing</option>
        </select><br>
        
        <label for="client_id">Client ID:</label><br>
        <select id="client_id" name="client_id">
            <?php
            include 'db_connection.php'; // Include your database connection file

            // Fetch existing client IDs from the Client table
            $sql = "SELECT client_id FROM Client";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['client_id'] . "'>" . $row['client_id'] . "</option>";
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
