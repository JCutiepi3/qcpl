<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <a href="proofviewdocument.php">
                    <span class="icon">
                    <ion-icon name="documents-outline"></ion-icon>
                    </span>
                    <span class="title">Documents<ion-icon id="dash_down_btn" name="caret-down-outline"></ion-icon></span>
                    </a>
                         <li class="sub_dash"><a href="proofreaderincoming.php">Incoming</a></li>
                         <li class="sub_dash"><a href="proofreaderoutgoing.php">Outgoing</a></li>
                         <li class="sub_dash"><a href="#">Approved</a></li>
                
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
                        <h2>View Document</h2>
                        <div>   
                        <table aria-describedby="tableDescription">
                            <thead>
                                <tr>
                                    <th><center>Locator Number</center></th>
                                    <th><center>File Name</center></th>
                                    <th><center>File</center></th>
                                    <th><center>Status</center></th>
                                    <th><center>Action</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qcpl";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT locator_num, file_path, status FROM fileupload WHERE status != 'Approved'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='text-align: center;'>" . htmlspecialchars($row["locator_num"]) . "</td>";
        echo "<td style='text-align: center;'>" . htmlspecialchars($row["file_path"]) . "</td>";
        echo "<td style='text-align: center;'><a href='/qcpl/Backend/" . htmlspecialchars($row["file_path"]) . "' target='_self' aria-label='View file for " . htmlspecialchars($row["locator_num"]) . "'>View File</a></td>";
        echo "<td style='text-align: center;'>" . htmlspecialchars($row["status"]) . "</td>";
        echo "<td><a href='proofreaderdocuments.php?locator_num=" . htmlspecialchars($row["locator_num"]) . "' target='_self' aria-label='View details for " . htmlspecialchars($row["locator_num"]) . "'>View</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}

$conn->close();
?>
                        </div>



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
    