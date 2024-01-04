<!DOCTYPE html>
<html>
<head>
    <title>Create Client</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h2>Create New Client</h2>
    <form method="post" action="process_create_client.php">
        <!-- Input fields for client details (name, address, email, phone, etc.) -->
        <!-- Example: -->
        <label for="client_name">Client Name:</label><br>
        <input type="text" id="client_name" name="client_name"><br>
        
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br>
        
        <label for="contact_email">Email:</label><br>
        <input type="email" id="contact_email" name="contact_email"><br>
        
        <label for="contact_phone">Phone:</label><br>
        <input type="text" id="contact_phone" name="contact_phone"><br>
        
        <!-- Add other necessary fields -->
        
        <input type="submit" name="submit" value="Create">
    </form>
</body>
</html>
