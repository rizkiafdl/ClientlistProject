<!DOCTYPE html>
<html>
<head>
    <title>Project CRUD</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h1>Project Management</h1>
    <ul>
        <li><a href="?action=create">Create Project</a></li>
        <li><a href="?action=read">View Projects</a></li>
        <li><a href="?action=update">Update Project</a></li>
        <li><a href="?action=delete">Delete Project</a></li>
    </ul>

    <?php
    // Include your database connection file here
    // Replace with your actual database connection code
    include 'db_connection.php';
    // Handle user actions
    if(isset($_GET['action'])) {
        $action = $_GET['action'];

        switch($action) {
            case 'create':
                // Create project form
                include 'create_project.php';
                break;

            case 'read':
                // Read projects
                include 'read_projects.php';
                break;

            case 'update':
                // Update project form
                include 'update_project.php';
                break;

            case 'delete':
                // Delete project form
                include 'delete_project.php';
                break;

            default:
                echo "Invalid action";
        }
    }

    
    ?>
</body>
</html>
