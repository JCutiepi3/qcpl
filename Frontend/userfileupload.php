<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["useroutgoingupload"])) {
    $category = 'Outgoing';
    $status = 'PROOFREAD';

    $query = "INSERT INTO fileupload (file_name, category, locator_num, received_date, received_from, subject, description, type, file_path, boss2_comment, boss1_comment, status) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, '', '', ?)";
    $stmt = $conn->prepare($query);
    $locator_num = $_POST['locator_num'];
    $received_date = $_POST['received_date'];
    $received_from = $_POST['received_from'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $fileName = $_FILES['fileName']['name'];
    $tempName = $_FILES['fileName']['tmp_name'];
    $file_path = "File_Uploaded/" . $fileName;

    $stmt->bind_param("ssisssssss", $fileName, $category, $locator_num, $received_date, $received_from, $subject, $description, $type, $file_path, $status);

    if (!empty($fileName) && move_uploaded_file($tempName, $file_path)) {
        if ($stmt->execute()) {
            echo "<script>alert('Successfully Added Documents!'); window.location='userdashboard.php';</script>";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert('Error uploading file.'); window.location.href = 'useroutgoing.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
