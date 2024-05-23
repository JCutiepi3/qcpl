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
// if (!isset($_SESSION['name'])) {
//     // Redirect to login page if user is not logged in
//     header("Location: ../login.html");
//     exit();
// }

// Fetch all files from database
$sql = "SELECT * FROM testupload ORDER BY ID DESC"; // Fetch all files
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>List of Files:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        $fileName = $row["filename"];
        $filePath = $row["filepath"];
        echo "<li><a href='receivefileuser2.php?file=$filePath'>$fileName</a></li>";
    }
    echo "</ul>";
} else {
    echo "No files found.";
}

// File download handling
if(isset($_GET['file'])) {
    $filePath = $_GET['file'];
    if (file_exists($filePath)) {
        $fileName = basename($filePath);
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . $fileName);
        readfile($filePath);
        exit();
    } else {
        echo "File not found.";
    }
}

$conn->close();
?>
