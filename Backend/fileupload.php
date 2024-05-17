<?php
if(isset($_POST["upload"])) {
 
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "qcpl";
    
    $conn = new mysqli($server, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "INSERT INTO fileupload (file_name, category, locator_num, received_date, received_from, subject, description, type, file_path, boss2_comment, boss1_comment) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, '', '')";
    $stmt = $conn->prepare($query);

    $stmt->bind_param("ssissssss", $fileName, $category, $locator_num, $received_date, $received_from, $subject, $description, $type, $file_path);
    $category = $_POST['category'];
    $locator_num = $_POST['locator_num'];
    $received_date = $_POST['received_date'];
    $received_from = $_POST['received_from'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $type = $_POST['type'];

    $fileName = $_FILES['fileName']['name'];
    $tempName = $_FILES['fileName']['tmp_name'];
    $file_path = "File_Uploaded/" . $fileName;

    if (!empty($fileName) && move_uploaded_file($tempName, $file_path)) {
      
        if ($stmt->execute()) {
            echo "<script>alert('Successfully Added Documents!'); window.location='/qcpl/Frontend/Dashboard/doc.html';</script>";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading file.";
    }

    $stmt->close();
    $conn->close();
}
?>
