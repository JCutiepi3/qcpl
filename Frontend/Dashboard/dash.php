<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
}
$name = ""; 
if(isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    $sql = "SELECT name FROM admins WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
    }
    $stmt->close();
}
?>

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
                
                <div class="dropdown">
                    <li>
                    <a href="dash.php" class="dropdown-toggle">
                    <span class="icon">
                    <ion-icon name="apps"></ion-icon>
                    </span>
                    <span class="title">Dashboard <ion-icon id="down_btn" name="caret-down-outline"></ion-icon></span>
                    </a>
                    </li>
                    
                    <ul class="dropdown-menu">
                         <li class="sub_dash"><a href="incoming.php">Incoming</a></li>
                         <li class="sub_dash"><a href="outgoing.php">Outgoing</a></li>
                    </ul>
                </div>



                <li>
                    <a href="user.php">
                        <span class="icon">
                            <ion-icon name="people"></ion-icon>
                        </span>
                        <span class="title">Users</span>
                    </a>
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
                        <span class="title" >Add User</span>
                    </a>
                </li>

                <li>
                    <a href="faqs.html">
                        <span class="icon">
                            <ion-icon name="help"></ion-icon>
                        </span>
                        <span class="title">FAQs</span>
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
                
                <!-- Search Form -->
                <form action="/qcpl/Backend/locator.php" method="GET">
                    <div class="search">
                        <label>
                            <input type="number" name="locator" placeholder="Search here">
                            <input type="submit" id="sub_hide" name="find">
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                    </div>
                </form>

                <!-- Welcome Message -->
                <?php
                if(!empty($name)) {
                    echo "<div class='welcome'>Welcome, $name!</div>";
                } else {
                    echo "<div class='welcome'></div>";
                }
                ?>
                <div class="user"><span class="icon"><ion-icon name="person"></ion-icon></span></div>
            </div>

            <!-- Document Summary -->
            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>SUMMARY</h2>
                    </div>
                </div>
            </div>

            <div class="summary">
                <?php
                $rowsPerPage = 4;
                $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                $offset = ($page - 1) * $rowsPerPage;

                $sql = "SELECT * FROM fileupload LIMIT ? OFFSET ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii", $rowsPerPage, $offset);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Division</th><th>Section</th><th>Category</th><th>Locator Number</th><th>Received Date</th><th>Received From</th><th>File type</th><th>File</th><th>Status</th></tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . "<center>" . $row["division"] . "</td>";
                        echo "<td>" . "<center>" . $row["section"] . "</td>";
                        echo "<td>" . "<center>" . $row["category"] . "</td>";
                        echo "<td>" . "<center>" . $row["locator_num"] . "</td>";
                        echo "<td>" . "<center>" . $row["received_date"] . "</td>";
                        echo "<td>" . "<center>" . $row["received_from"] . "</td>";
                        echo "<td>" . "<center>" . $row["type"] . "</td>";
                        echo "<td id ='file'><a href='/qcpl/Backend/" . $row["file_path"] . "' target='_blank'>View File</a></td>";
                        echo "<td>" . "<center>" . $row["status"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                    $prevPage = $page - 1;
                    if ($prevPage > 0) {
                        echo "<a href='?page=$prevPage' id='prev'>Previous</a>";
                    }
                    $nextPage = $page + 1;
                    echo "<a href='?page=$nextPage' id='next'>Next</a>";
                } else {
                    echo "<script>alert('No documents found!'); window.location.href = '?page=1';</script>";
                }

                $stmt->close();
                $conn->close();
                ?>
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
    