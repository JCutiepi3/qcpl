<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qcpl";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $locator_num = $_POST['locator_num']; // Add this line to retrieve locator_num
    $division = $_POST['division'];
    $section = $_POST['section'];
    $boss1_comment = $_POST['comment']; // Updated from 'boss1_comment'
    $status = $_POST['status'];


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE fileupload SET division='$division', section='$section', comment='$comment', status='$status' WHERE locator_num='$locator_num'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
