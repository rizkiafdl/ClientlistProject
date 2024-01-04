<!DOCTYPE html>
<html>
<head>
    <title>Update Project</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Update Project</h2>

    <?php
    include 'db_connection.php'; // Include your database connection file

    // Fetch all projects from the database
    $sql = "SELECT * FROM Project";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display projects in a table
        echo "<h3>Current Projects</h3>";
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

    // Offer an option to update specific project details
    if(isset($_GET['project_id'])) {
        $project_id = $_GET['project_id'];

        // Fetch project details based on selected project_id
        $sql_specific = "SELECT * FROM Project WHERE project_id = $project_id";
        $result_specific = $conn->query($sql_specific);

        if ($result_specific->num_rows > 0) {
            // Display form to update specific project details
            $row = $result_specific->fetch_assoc();
            ?>
            <h3>Update Project</h3>
            <form method="post" action="process_update_project.php">
                <input type="hidden" name="project_id" value="<?php echo $row['project_id']; ?>">
                Project Name: <input type="text" name="project_name" value="<?php echo $row['project_name']; ?>"><br>
                Start Date: <input type="date" name="start_date" value="<?php echo $row['start_date']; ?>"><br>
                Due Date: <input type="date" name="due_date" value="<?php echo $row['due_date']; ?>"><br>
                Budget: <input type="number" step="0.01" name="budget" value="<?php echo $row['budget']; ?>"><br>
                Status: <input type="text" name="status" value="<?php echo $row['status']; ?>"><br>
                Client ID: <input type="number" name="client_id" value="<?php echo $row['client_id']; ?>"><br>
                <input type="submit" name="submit" value="Update">
            </form>
            <?php
        } else {
            echo "No project found with ID: $project_id";
        }
    } else {
        echo "<h3>Select a Project ID to Update:</h3>";
        ?>
        <form method="get" action="update_project.php">
            <label for="project_id">Project ID:</label>
            <input type="number" id="project_id" name="project_id">
            <input type="submit" value="Update">
        </form>
        <?php
    }

    $conn->close();
    ?>
</body>
</html>
