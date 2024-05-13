<?php
    // Establish database connection (assuming you have already defined $server, $username, $password, and $db)
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "qcpl";
    $conn = new mysqli($server, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // Query to fetch user or admin details based on ID
        $query = "SELECT * FROM users WHERE id = $id UNION SELECT * FROM admins WHERE id = $id";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if query executed successfully
        if (!$result) {
            die("QUERY FAILED: " . mysqli_error($conn));
        } else {
            // Fetch the row
            $row = mysqli_fetch_array($result);
        }
    } else {
        echo "No ID provided.";
    }
?>
<form action="updateuser.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Hidden input to pass user ID -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
