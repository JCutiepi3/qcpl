<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qcpl";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  
    $locator_num = isset($_POST['locator_num']) ? $_POST['locator_num'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $proofreader_comment = isset($_POST['proofreader_comment']) ? $_POST['proofreader_comment'] : '';

   
    

    $conn = new mysqli($servername, $username, $password, $dbname);

  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE fileupload SET proofreader_comment=?, status=? WHERE locator_num=?");
    $stmt->bind_param("sss", $proofreader_comment, $status, $locator_num);

 
    if ($stmt->execute() === TRUE) {
        echo "<script>alert('Successfully Updated the Database!'); window.location='/qcpl/Frontend/Dashboard/proofviewdocument.php';</script>";
        exit; 
    } else {
        echo "<script>alert('Error updating record: " . $stmt->error . "'); window.location='/qcpl/Frontend/Dashboard/proofviewdocument.php';</script>";
        exit;
    }


    $stmt->close();
    $conn->close();
}
?>
