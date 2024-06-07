<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Home</title>
    <!-- Styles -->
    <link rel="shortcut icon" type="image/x-icon" href="imgs/logo.png">
    <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- =============== Navigation ================ -->
  <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="img">
                            <img src="imgs/logo.png" >
                        </span>
                        <span class="title">Quezon City Public Library</span>
                    </a>
                </li>
                
                <li>
                    <a href="dash.php" class="dropdown-toggle">
                    <span class="icon">
                    <ion-icon name="apps"></ion-icon>
                    </span>
                    <span class="title">Dashboard<ion-icon id="dash_down_btn" name="caret-down-outline"></ion-icon></span>
                    </a>           
                </li>
         
                <li>
                    <a href="user.php">
                        <span class="icon"><ion-icon name="people"></ion-icon></span>
                        <span class="title">Accounts<ion-icon id="acct_down_btn" name="caret-down-outline"></ion-icon></span>
                </li>
                <li>
                    <a href="doc.html">
                        <span class="icon">
                            <ion-icon name="add-circle"></ion-icon>
                        </span>
                        <span class="title">Upload Document</span>
                    </a>
                </li>

                <li>
                    <a href="adduser.html">
                        <span class="icon">
                            <ion-icon name="person-add"></ion-icon>
                        </span>
                        <span class="title" >Add Account</span>
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

        <!-- Main Content -->
        <div class="main">
            <div class="topbar">
                <div class="toggle"><ion-icon name="menu-outline"></ion-icon></div>
                
                <div class="user"><span class="icon"><ion-icon name="person"></ion-icon></span></div>
            </div>

            <!-- Document Summary -->
            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>Document</h2>

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

if(isset($_GET['locator_num'])){
    $locator_num = $_GET['locator_num'];
    echo "<h1>Locator Number: $locator_num</h1>";
    $sql = "SELECT locator_num, category, subject, description, received_from, received_date, proofreader_comment, boss2_comment, boss1_comment, type, file_path, status FROM fileupload WHERE locator_num = '$locator_num'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Locator Number</th><th>Category</th><th>Subject</th><th> Description</th><th>Receive From</th><th>Receive Date</th><th>Proofreader Comment</th><th>Boss 2 Comment</th><th>Boss 1 Comment</th><th>File Type</th><th>File</th><th>Status</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><center>".$row["locator_num"]."</td>";
            echo "<td><center>".$row["category"]."</td>";
            echo "<td><center>".$row["subject"]."</td>";
            echo "<td><center>".$row["description"]."</td>";
            echo "<td><center>".$row["received_from"]."</td>";
            echo "<td><center>".$row["received_date"]."</td>";
            echo "<td><center>".$row["proofreader_comment"]."</td>";
            echo "<td><center>".$row["boss2_comment"]."</td>";
            echo "<td><center>".$row["boss1_comment"]."</td>";
            echo "<td><center>".$row["type"]."</td>";
            echo "<td><center><a href='/qcpl/Backend/" . $row["file_path"] . "' target='_self'>View File</a></td>";
            echo "<td><center>".$row["status"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
} else {
    echo "Locator number not provided.";
}
?>
            <div class ="summary">
         </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="main.js"></script>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>

