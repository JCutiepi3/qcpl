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
    $owner = $_POST['owner'];
    $division = $_POST['division'];
    $section = $_POST['section'];
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

    $query = "INSERT INTO fileupload (file_name, owner, division, section, category, locator_num, received_date, received_from, subject, description, type, file_path) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssssss", $fileName, $owner, $division, $section, $category, $locator_num, $received_date, $received_from, $subject, $description, $type, $file_path);

    if ($stmt->execute()) {
        echo "<script>alert('Successfully Added Documents!'); window.location='/qcpl/Backend/upload.html';</script>";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    if (!empty($fileName)) {
        $location = "File_Uploaded/";
        if (move_uploaded_file($tempName, $location . $fileName)) {
            echo "File uploaded successfully.";

            $sql = "INSERT INTO files (file_name, file_path) VALUES ('$fileName', '$file_path')";
            if ($conn->query($sql) === TRUE) {
                echo "File record inserted successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Please select a file.";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
