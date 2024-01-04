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
    <h1>Client Management</h1>
    <ul>
        <li><a href="?action=create">Create Client</a></li>
        <li><a href="?action=read">View Client</a></li>
        <li><a href="?action=update">Update Client</a></li>
        <li><a href="?action=delete">Delete Client</a></li>
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
                include 'create_client.php';
                break;

            case 'read':
                // Read projects
                include 'read_clients.php';
                break;

            case 'update':
                // Update project form
                include 'update_clients.php';
                break;

            case 'delete':
                // Delete project form
                include 'delete_clients.php';
                break;

            default:
                echo "Invalid action";
        }
    }

    
    ?>
</body>
</html>
