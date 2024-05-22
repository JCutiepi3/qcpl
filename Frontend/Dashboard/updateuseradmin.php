<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!isset($_SESSION['name'])) {
    // Redirect to login page if user is not logged in
    header("Location: ../login.html");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        die("Invalid ID provided.");
    }

    $query = "SELECT * FROM users WHERE id = ? UNION SELECT * FROM admins WHERE id = ? UNION SELECT * FROM boss1 WHERE id = ? UNION SELECT * FROM boss2 WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiii", $id, $id, $id, $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("QUERY FAILED: " . $conn->error);
    } else {
        $row = $result->fetch_array();
    }
} else {
    echo "No ID provided.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input
    if (empty($name) || empty($username) || empty($password)) {
        die("Name, username, and password fields are required.");
    }

    // Update details based on the determined table
    $update_user_query = "UPDATE users SET name=?, username=?, password=? WHERE id=?";
    $update_user_stmt = $conn->prepare($update_user_query);
    $update_user_stmt->bind_param("sssi", $name, $username, $password, $id);
    $update_user_result = $update_user_stmt->execute();

    $update_admin_query = "UPDATE admins SET name=?, username=?, password=? WHERE id=?";
    $update_admin_stmt = $conn->prepare($update_admin_query);
    $update_admin_stmt->bind_param("sssi", $name, $username, $password, $id);
    $update_admin_result = $update_admin_stmt->execute();

    $update_boss1_query = "UPDATE boss1 SET name=?, username=?, password=? WHERE id=?";
    $update_boss1_stmt = $conn->prepare($update_boss1_query);
    $update_boss1_stmt->bind_param("sssi", $name, $username, $password, $id);
    $update_boss1_result = $update_boss1_stmt->execute();

    $update_boss2_query = "UPDATE boss2 SET name=?, username=?, password=? WHERE id=?";
    $update_boss2_stmt = $conn->prepare($update_boss2_query);
    $update_boss2_stmt->bind_param("sssi", $name, $username, $password, $id);
    $update_boss2_result = $update_boss2_stmt->execute();

    if (!$update_user_result && !$update_admin_result && !$update_boss1_result && !$update_boss2_result) {
        die("Update failed: " . $conn->error);
    } else {
        header("Location: user.php");
        exit(); 
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>"> 
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo isset($row['username']) ? $row['username'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" name="password" class="form-control" value="<?php echo isset($row['password']) ? $row['password'] : ''; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
