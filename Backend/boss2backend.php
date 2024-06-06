<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qcpl";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $locator_num = isset($_POST['locator_num']) ? htmlspecialchars($_POST['locator_num']) : '';
    $boss2_comment = isset($_POST['comment']) ? htmlspecialchars($_POST['comment']) : ''; 
    $status = isset($_POST['status']) ? htmlspecialchars($_POST['status']) : '';
    $status = "Second Review";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE fileupload SET boss2_comment=?, status=? WHERE locator_num=?");
    $stmt->bind_param("sss", $boss2_comment, $status, $locator_num);

    if ($stmt->execute() === TRUE) {
        echo "<script>alert('Successfully Updated the Database!'); window.location='/qcpl/Frontend/Dashboard/boss2account.php';</script>";
    } else {
        echo "<script>alert('Error updating record: " . $stmt->error . "'); window.location='/qcpl/Frontend/Dashboard/boss2account.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>