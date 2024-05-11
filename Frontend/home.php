<!DOCTYPE html>
<html>
<head>
    <title> QUEZON CITY PUBLIC LIBRARY </title>
    <link rel="shortcut icon" type="image/x-icon" href="img/Logo.png">
    <link rel="stylesheet" type="text/css" href="home.css">
    
</head>
<body>
    <header>
    	<a href="https://web.quezoncitypubliclibrary.org/">
        <img src="img/Logo.png" alt="Logo" class="logo"></a>
        <div class="navbar">
            <a href="home.php"> Home </a>
            <a href="login.html"><ion-icon name="person-circle-outline" class="login-icon"></ion-icon></a>
    </header>
    <section>
        <div class="icons">
             <a href="https://www.facebook.com/quezoncitypubliclibrary"><ion-icon name="logo-facebook"></ion-icon></a>
             <a href="https://www.instagram.com/qcpubliclibrary/"><ion-icon name="logo-instagram"></ion-icon></a>
             <a href="https://twitter.com/qcpubliclibrary"><ion-icon name="logo-twitter"></ion-icon></a>
        </div>
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>  
    </section>

    //user summary
<div class="container">
<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$owner = "user";

$sql = "SELECT * FROM fileupload WHERE owner = '$owner'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    echo "<table>";
    echo "<tr><th>Owner</th><th>Division</th><th>Section</th><th>Category</th><th>Locator Number</th><th>Received Date</th><th>Received From</th><th>Type</th><th>File</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" ."<center>". $row["owner"] . "</td>";
        echo "<td>" ."<center>". $row["division"] . "</td>";
        echo "<td>" ."<center>". $row["section"] . "</td>";
        echo "<td>" ."<center>". $row["category"] . "</td>";
        echo "<td>" ."<center>". $row["locator_num"] . "</td>";
        echo "<td>" ."<center>". $row["received_date"] . "</td>";
        echo "<td>" ."<center>". $row["received_from"] . "</td>";
        echo "<td>" ."<center>". $row["type"] . "</td>";
        echo "<td><a href='/qcpl/Backend/" . $row["file_path"] . "' target='_blank'>View File</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<script>alert('No document found!');</script>";
}

$conn->close();
?>
</div>
</body>
</html>
