<?php
if(isset($_POST["create"])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "qcpl";

    $conn = new mysqli($server, $username, $password, $db);

    if($conn->connect_error){
        die("Failed to connect. " . $conn->connect_error);
    }

    $name = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $account_type = $conn->real_escape_string($_POST['account_type']);

    // Check if password meets the length requirement
    if(strlen($password) < 8) {
        echo "<script>alert('Password must be at least 8 characters long.'); window.location='/qcpl/Frontend/Dashboard/adduser.html';</script>";
        exit();
    }

    if ($account_type == "admin") {
        $query = "INSERT INTO admins (name, username, password) VALUES ('$name', '$username', '$password')";
    } elseif ($account_type == "user") {
        $query = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";
    } else {
        echo "<script>alert('Invalid account type!'); window.location='/qcpl/Frontend/Dashboard/dash.php';</script>";
        exit();
    }

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Account Created'); window.location='/qcpl/Frontend/Dashboard/adduser.html';</script>";
    } else {
        echo "<script>alert('Failed to create account!'); window.location='/qcpl/Frontend/Dashboard/adduser.html';</script>";
    }

    $conn->close();
}
?>