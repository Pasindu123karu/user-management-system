<?php
// Establish a MySQL connection
$connection = mysqli_connect("localhost", "root", "", "user_management_db");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve all users from the database
$query = "SELECT * FROM user";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>User List</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['id']}</td><td>{$row['first_name']}</td><td>{$row['last_name']}</td><td>{$row['email']}</td></tr>";
    }

    echo "</table>";
} else {
    echo "No user found.";
}

// Close the database connection
mysqli_close($connection);
?>
