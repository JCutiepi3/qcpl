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
if (isset($_POST["submit"])) {
    $target_dir = "C:/xampp/htdocs/qcpl/Backend/File_Uploaded/";
    $uploadOk = 1;

    // Loop through each file
    foreach ($_FILES["fileToUpload"]["tmp_name"] as $key => $tmp_name) {
        $file_name = $_FILES["fileToUpload"]["name"][$key];
        $file_size = $_FILES["fileToUpload"]["size"][$key];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $target_file = $target_dir . basename($file_name);

        // Check if file already exists in the upload directory
        if (file_exists($target_file)) {
            echo "<script>alert('Sorry, file $file_name already exists in the upload directory.'); window.location.href='sendfileuser1.html';</script>";
            $uploadOk = 0;
        }

        // Check file size (50 MB limit)
        if ($file_size > 52428800) { // 50 MB in bytes
            echo "<script>alert('Sorry, file $file_name is too large. Maximum file size allowed is 50 MB.'); window.location.href='sendfileuser1.html';</script>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowed_formats = array("txt", "pdf", "doc", "docx");
        if (!in_array($file_type, $allowed_formats)) {
            echo "<script>alert('Sorry, only TXT, PDF, DOC & DOCX files are allowed for $file_name.'); window.location.href='sendfileuser1.html';</script>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>alert('Sorry, your file $file_name was not uploaded.'); window.location.href='sendfileuser1.html';</script>";
        } else {
            if (move_uploaded_file($tmp_name, $target_file)) {
                // Insert file details into database
                $stmt = $conn->prepare("INSERT INTO testupload (filename, filepath) VALUES (?, ?)");
                $stmt->bind_param("ss", $file_name, $target_file);
                if ($stmt->execute()) {
                    echo "<script>alert('The file $file_name has been uploaded successfully.'); window.location.href='sendfileuser1.html';</script>";
                } else {
                    echo "<script>alert('Error: " . $stmt->error . "');</script>";
                }
                $stmt->close();
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file $file_name.'); window.location.href='sendfileuser1.html';</script>";
            }
        }
    }
}

// File deletion handling
if (isset($_POST["delete"])) {
    $file_id = $_POST["ID"];
    $stmt_select = $conn->prepare("SELECT filepath FROM testupload WHERE ID = ?");
    $stmt_select->bind_param("i", $file_id);
    $stmt_select->execute();
    $result = $stmt_select->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file_path = $row["filepath"];
        // Delete file from directory
        if (unlink($file_path)) {
            // Delete file record from database
            $stmt_delete = $conn->prepare("DELETE FROM testupload WHERE ID = ?");
            $stmt_delete->bind_param("i", $file_id);
            if ($stmt_delete->execute()) {
                echo "<script>alert('File deleted successfully from both database and directory.'); window.location.href='sendfileuser1.html';</script>";
            } else {
                echo "<script>alert('Error deleting file from database: " . $stmt_delete->error . "'); window.location.href='sendfileuser1.html';</script>";
            }
            $stmt_delete->close();
        } else {
            echo "<script>alert('Error deleting file from directory.'); window.location.href='sendfileuser1.html';</script>";
        }
    } else {
        echo "<script>alert('File not found in the database.'); window.location.href='sendfileuser1.html';</script>";
    }
    $stmt_select->close();
}

$conn->close();
?>