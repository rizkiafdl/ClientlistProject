<!DOCTYPE html>
<html>
<head>
    <title>Project CRUD</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        li {
            margin-top: 10px;
        }

        li a {
            text-decoration: none;
            color: #333;
            padding: 8px 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        li a:hover {
            background-color: #eaeaea;
        }
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
                include 'create_invoice.php';
                break;

            case 'read':
                // Read projects
                include 'read_invoice.php';
                break;

            case 'update':
                // Update project form
                include 'update_invoice.php';
                break;

            case 'delete':
                // Delete project form
                include 'delete_invoice.php';
                break;

            default:
                echo "Invalid action";
        }
    }

    
    ?>
</body>
</html>
