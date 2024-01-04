<!DOCTYPE html>
<html>
<head>
    <title>Database Dashboard</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        h2 {
            margin-top: 30px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

        a {
            text-decoration: none;
            display: block;
            width: 200px;
            margin: 10px auto;
            text-align: center;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Database Dashboard</h1>
    
    <?php
    try {
        include 'db_connection.php';

        // Function to display relations between tables
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

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        echo "<h2>Relations</h2>";
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

        // Function to display individual tables
        function displayTable($conn, $tableName) {
            $sql = "SELECT * FROM $tableName";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h2>$tableName Table</h2>";
                echo "<table border='1'>";
                echo "<tr>";
                $columns = $result->fetch_fields();
                foreach ($columns as $column) {
                    echo "<th>$column->name</th>";
                }
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        }

        // Display individual tables
        $tables = ["Project", "Client", "Invoice"];
        foreach ($tables as $table) {
            displayTable($conn, $table);
        }

        $conn->close();

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>

    <!-- Buttons to access different management menus -->
    <a href="project_menu/project_menu.php"><button>Project Management</button></a>
    <a href="invoice/invoice_menu.php"><button>Invoice Management</button></a>
    <a href="client/client_menu.php"><button>Client Management</button></a>
    <a href="reports.php"><button>Reports</button></a>
</body>
</html>
