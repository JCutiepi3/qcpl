<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "qcpl";

    $conn = new mysqli($server, $username, $password, $db);

    if($conn->connect_error){
        die("Failed to connect. " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $division = $conn->real_escape_string($_POST['division']);
    $section = $conn->real_escape_string($_POST['Section']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $account_type = $conn->real_escape_string($_POST['account_type']);

    if(strlen($password) < 8) {
        echo "<script>alert('Password must be at least 8 characters long.'); window.location='/qcpl/Frontend/Dashboard/adduser.html';</script>";
        exit();
    }

    if ($account_type == "admin") {
        $query = "INSERT INTO admins (name, division, section, username, password) VALUES ('$name', '$division', '$section', '$username', '$password')";
    } elseif ($account_type == "user") {
        $query = "INSERT INTO users (name, division, section, username, password) VALUES ('$name', '$division', '$section', '$username', '$password')";
    } 
    elseif ($account_type == "boss1") {
        $query = "INSERT INTO boss1 (name, division, section, username, password) VALUES ('$name', '$division', '$section', '$username', '$password')";
    } 
    elseif ($account_type == "boss2") {
        $query = "INSERT INTO boss2 (name, division, section, username, password) VALUES ('$name', '$division', '$section', '$username', '$password')";
    } 
    elseif ($account_type == "proofread") {
        $query = "INSERT INTO proofreader (name, division, section, username, password) VALUES ('$name', '$division', '$section', '$username', '$password')";
    } 
    elseif ($account_type == "receiver") {
        $query = "INSERT INTO receiving (name, division, section, username, password) VALUES ('$name', '$division', '$section', '$username', '$password')";
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
