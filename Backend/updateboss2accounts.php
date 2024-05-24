<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password']; 

    $query = "UPDATE boss2 SET name=?, username=?, password=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $name, $username, $password, $id);
    if ($stmt->execute()) {
        echo "Boss2 updated successfully.";
        header("Location: /qcpl/Frontend/Dashboard/boss2accounts.php"); // Redirect back to the boss2 accounts page
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve boss2 data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM boss2 WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $boss2 = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Boss2</title>
</head>
<body>
    <h2>Edit Boss2</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $boss2['id']; ?>">
        <p>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $boss2['name']; ?>">
        </p>
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo $boss2['username']; ?>">
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?php echo $boss2['password']; ?>">
        </p>
        <input type="submit" value="Update Boss2">
    </form>
</body>
</html>