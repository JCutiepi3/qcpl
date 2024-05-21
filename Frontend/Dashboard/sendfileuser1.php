<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change this
$password = ""; // Change this
$dbname = "qcpl";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// File upload handling
if(isset($_POST["submit"])) {
    $target_dir = "C:/xampp/htdocs/qcpl/Backend/File_Uploaded/";
    $uploadOk = 1;

    // Loop through each file
    foreach($_FILES["fileToUpload"]["tmp_name"] as $key=>$tmp_name) {
        $file_name = $_FILES["fileToUpload"]["name"][$key];
        $file_size = $_FILES["fileToUpload"]["size"][$key];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $target_file = $target_dir . basename($file_name);

        // Check if file already exists in the upload directory
        if (file_exists($target_file)) {
            echo "Sorry, file $file_name already exists in the upload directory.<br>";
            $uploadOk = 0;
        }

        // Check file size (50 MB limit)
        if ($file_size > 52428800) { // 50 MB in bytes
            echo "Sorry, file $file_name is too large. Maximum file size allowed is 50 MB.<br>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowed_formats = array("txt", "pdf", "doc", "docx");
        if (!in_array($file_type, $allowed_formats)) {
            echo "Sorry, only TXT, PDF, DOC & DOCX files are allowed for $file_name.<br>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file $file_name was not uploaded.<br>";
        } else {
            if (move_uploaded_file($tmp_name, $target_file)) {
                // Insert file details into database
                $sql = "INSERT INTO testupload (filename, filepath) VALUES ('$file_name', '$target_file')";
                if ($conn->query($sql) === TRUE) {
                    echo "The file $file_name has been uploaded successfully.<br>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file $file_name.<br>";
            }
        }
    }
}

// File deletion handling
if(isset($_POST["delete"])) {
    $file_id = $_POST["ID"];
    $sql_select = "SELECT filepath FROM testupload WHERE ID = $file_id";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file_path = $row["filepath"];
        // Delete file from directory
        if (unlink($file_path)) {
            // Delete file record from database
            $sql_delete = "DELETE FROM testupload WHERE id = $file_id";
            if ($conn->query($sql_delete) === TRUE) {
                echo "File deleted successfully from both database and directory.";
            } else {
                echo "Error deleting file from database: " . $conn->error;
            }
        } else {
            echo "Error deleting file from directory.";
        }
    } else {
        echo "File not found in the database.";
    }
}
$conn->close();
?>
