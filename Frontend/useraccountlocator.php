<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <!-- ======= Styles ====== -->
    <link rel="shortcut icon" type="image/x-icon" href="img/Logo.png">
    <link rel="stylesheet" href="userdashboard.css">
</head>
<body>

     <!-- =============== Navigation ================ -->
     <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="img">
                            <img src="img/Logo.png" >
                        </span>
                        <span class="title">Quezon City Public Library</span>
                    </a>
                </li>
                
                <li>
                    <a href="userdashboard.php" class="dropdown-toggle">
                    <span class="icon">
                    <ion-icon name="apps"></ion-icon>
                    </span>
                    <span class="title">Dashboard<ion-icon id="dash_down_btn" name="caret-down-outline"></ion-icon></span>
                    </a>
                    

                         <li class="sub_dash"><a href="userincomingdash.php">Incoming</a></li>
                         <li class="sub_dash"><a href="useroutgoingdash.php">Outgoing</a></li>
                
                <li>
                    <a href="useroutgoing.php" class="dropdown-toggle">
                    <span class="icon">
                    <ion-icon name="add-circle"></ion-icon>
                    </span>
                    <span class="title">Upload Document</span>
                    </a>
                </li>

                <li>
                    <a href="/qcpl/Backend/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                
                
            <form action="/qcpl/Backend/locator.php" method="GET">
                <div class="search">
                    <label>
                        <input type="number" name="locator" placeholder="Search here">
                        <input type="submit" id="sub_hide" name="find">
                        <ion-icon name="search-outline" name="locate"></ion-icon>
                    </label>
                </div>
            </form>
               

                <div class="user">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>DOCUMENTS</h2>   
                        </div>
                    <div class="sum_tb">
                        <table aria-describedby="tableDescription">
                        <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qcpl";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$locator_num = isset($_GET['locator_num']) ? $_GET['locator_num'] : 'Not provided';

$sql = "SELECT `locator_num`, `category`, `subject`, `description`, `received_from`, `received_date`, `proofreader_comment`, `boss2_comment`, `boss1_comment`, `type`, `file_path`, `status` FROM fileupload WHERE `locator_num` = '$locator_num'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    while($row = $result->fetch_assoc()) {
        echo "<h1>Locator Number: " . $row["locator_num"] . "</h1>";
        echo "<p>Category: " . $row["category"] . "</p>";
        echo "<p>Subject: " . $row["subject"] . "</p>";
        echo "<p>Description: " . $row["description"] . "</p>";
        echo "<p>Receive from: " . $row["received_from"] . "</p>";
        echo "<p>Receive Date: " . $row["received_date"] . "</p>";
        echo "<p>Proofreader Comment: " . $row["proofreader_comment"] . "</p>";
        echo "<p>Boss 2 Comment: " . $row["boss2_comment"] . "</p>";
        echo "<p>Boss 1 Comment: " . $row["boss1_comment"] . "</p>";
        echo "<p>File Type: " . $row["type"] . "</p>";
        echo "<td><center><a href='/qcpl/Backend/" . $row["file_path"] . "' target='_self'>View File</a></td>";
        echo "<p>Status: " . $row["status"] . "</p>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
                    </div> 
                    
                </div>
               
    <!-- =========== Scripts =========  -->
    <script src="main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>