<?php
    // Establish database connection (assuming you have already defined $server, $username, $password, and $db)
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "qcpl";
    $conn = new mysqli($server, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Query to fetch user or admin details based on ID
        $query = "SELECT * FROM users WHERE id = $id UNION SELECT * FROM admins WHERE id = $id";

        $query = "DELETE FROM users WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed: " . mysqli_error($conn)); // Pass $conn as argument
        }

        $query = "DELETE FROM admins WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed: " . mysqli_error($conn)); // Pass $conn as argument
        }

        header('location:user.php?delete_msg=You have deleted the record.');
    }
?>
