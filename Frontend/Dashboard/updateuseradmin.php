<?php
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

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $id = $_POST['id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Server-side validation for password length
        if (strlen($password) < 8) {
            die("Password must be at least 8 characters long.");
        }
    
        // Update user details in the database
        $update_user_query = "UPDATE users SET name=?, username=?, password=? WHERE id=?";
        $update_user_stmt = $conn->prepare($update_user_query);
        $update_user_stmt->bind_param("sssi", $name, $username, $password, $id);
        $update_user_result = $update_user_stmt->execute();
    
        // Update admin details in the database
        $update_admin_query = "UPDATE admins SET name=?, username=?, password=? WHERE id=?";
        $update_admin_stmt = $conn->prepare($update_admin_query);
        $update_admin_stmt->bind_param("sssi", $name, $username, $password, $id);
        $update_admin_result = $update_admin_stmt->execute();
    
        // Check if query executed successfully
        if (!$update_user_result && !$update_admin_result) {
            die("Update failed: " . $conn->error);
        } else {
            // Redirect to another page
            header("Location: user.php");
            exit(); // Make sure no further code is executed after the redirect
        }
    }
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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
        <input type="password" name="password" class="form-control" minlength="8" value="<?php echo $row['password']; ?>">
        <!-- Add minlength="8" to enforce minimum 8 characters -->
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>