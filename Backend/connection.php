<?php
if(isset($_POST["login"])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "qcpl";

    $conn = new mysqli($server, $username, $password, $db);

    if($conn->connect_error) {
        die("Failed to connect: " . $conn->connect_error);
    }
 
    $query = "SELECT * FROM admins WHERE BINARY username = ? AND BINARY password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $_POST['username'], $_POST['password']);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        echo "<script>alert('Successfully Login'); window.location='/qcpl/Frontend/Dashboard/dash.php';</script>";
    } else {

        $query = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $_POST['username'], $_POST['password']);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            echo "<script>alert('Successfully Login'); window.location='/qcpl/Frontend/userdashboard.php';</script>";
        } else {
            echo "<script>alert('Incorrect Username or Password'); window.location='/qcpl/Frontend/login.html';</script>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
