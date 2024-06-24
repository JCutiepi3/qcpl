<?php
if(isset($_GET['find'])) {
    $locator = $_GET['locator'];

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "qcpl";

    $conn = new mysqli($server, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM fileupload WHERE locator_num = '$locator'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('File was Found!');</script>";

        while($row = $result->fetch_assoc()) {
            echo "Locator Number: " . $row["locator_num"]. "<br>Subject: " . $row["subject"].
            "<br>Description: " . $row["description"].   "<br>Category: " . $row["category"]. 
            "<br> Division: " . $row["division"] . "<br>Section: " . $row["section"] . "<br>Proof Reader Comment: " . $row["proofreader_comment"].
            "<br>Boss 2 Comment: " . $row["section"]. "<br>Boss 1 Comment: " . $row["boss1_comment"]."<br>Received From: " . $row["received_from"].
            "<br>Received Date: " . $row["received_date"] ."<br>File: <a href='/qcpl/Backend/".$row["file_path"]."' target='_blank'>View File</a>". 
            "<br>Status: " . $row["status"];
        }
    } else {
        echo "<script>alert('No document found!'); window.location='/qcpl/Frontend/Dashboard/dash.php';</script>";
    }
    $conn->close();
}
?>
