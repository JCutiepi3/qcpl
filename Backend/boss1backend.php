
<?php
// Establish connection to your database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $division = $_POST['division'];
    $section = $_POST['section'];
    $boss1_comment = $_POST['boss1_comment'];
    $status = $_POST['status'];

    // Prepare and bind the update statement
    $stmt = $conn->prepare("UPDATE fileupload SET division=?, section=?, boss1_comment=?, status=? WHERE id=?");
    $stmt->bind_param("ssssi", $division, $section, $boss1_comment, $status, $id);

    // Set parameters and execute the statement
    $id = $_POST['id']; // Assuming you have an id field in your form
    $stmt->execute();

    // Close statement
    $stmt->close();

    // Redirect to the page after updating
    header("Location: /Frontend/Dashboard/bossaccount.php");
    exit();
}
?>