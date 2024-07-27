<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
</head>
<body>
    <h1>Delete User</h1>
    <form action="remove_user.php" method="POST">
        <label for="user_id">Select a User to Delete:</label>
        <select name="user_id" required>
            <option value="">Select User</option>
            
            <?php
            // Establish a MySQL connection
            $connection = mysqli_connect("localhost", "root", "", "user_management_db");

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve the list of users from the database
            $query = "SELECT id, first_name, last_name FROM users";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id']}'>{$row['first_name']} {$row['last_name']}</option>";
                }
            }

            // Close the database connection
            mysqli_close($connection);
            ?>
            
        </select><br>
        
        <input type="submit" value="Delete User">
    </form>
</body>
</html>
