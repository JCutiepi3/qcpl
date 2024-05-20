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
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT name FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
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

    <!-- Navigation -->
    <div class="container">
        <div class="navigation">
            <ul>
                <!-- Logo and Title -->
                <li>
                    <a href="#">
                        <span class="img">
                            <img src="imgs/logo.png">
                        </span>
                        <span class="title">Quezon City Public Library</span>
                    </a>
                </li>

                
                <!-- Navigation Links -->
            <li class="dropdown" onclick="toggleDropdown('dashboardDropdown')">
            <a href="dash.php" class="dropbtn"><ion-icon name="apps"></ion-icon><span class="title">Dashboard</span></a>
            <div class="dropdown-content" id="dashboardDropdown">
            <a href="incoming.php">Incoming</a>
            <a href="outgoing.php">Outgoing</a>
            </div>
            </li>

            <script>
            function toggleDropdown(dropdownId) {
                var dropdown = document.getElementById(dropdownId);
                dropdown.classList.toggle("show");
            }

            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    for (var i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
            </script>

            </li>
                <li><a href="user.php"><ion-icon name="people"></ion-icon><span class="title">Users</span></a></li>
                <li><a href="doc.html"><ion-icon name="add-circle"></ion-icon><span class="title">Upload Document</span></a></li>
                <li><a href="adduser.html"><ion-icon name="person-add"></ion-icon><span class="title">Add User</span></a></li>
                <li><a href="faqs.html"><ion-icon name="help"></ion-icon><span class="title">FAQs</span></a></li>
                <li><a href="/qcpl/Backend/logout.php"><ion-icon name="log-out-outline"></ion-icon><span class="title">Sign Out</span></a></li>
                
            </ul>
            
        </div>

        <!-- Main Content -->
        <div class="main">
            <div class="topbar">
                <div class="toggle"><ion-icon name="menu-outline"></ion-icon></div>
                
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
                    echo "<div class='welcome'>Welcome!</div>";
                }
                ?>
                <div class="user"><span class="icon"><ion-icon name="person"></ion-icon></span></div>
            </div>

            <!-- Document Summary -->
            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>SUMMARY</h2>
                        <?php
            // Fetch documents from database
            $rowsPerPage = 4;
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $offset = ($page - 1) * $rowsPerPage;

            // Modify the SQL query to filter by category
            $sql = "SELECT * FROM fileupload WHERE category = 'Incoming' LIMIT ? OFFSET ?";
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
                    echo "<td><a href='/qcpl/Backend/" . $row["file_path"] . "' target='_blank'>View File</a></td>";
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
                // No documents found, display alert and go back to displaying the first 4 rows
                echo "<script>alert('No documents found!'); window.location.href = '?page=1';</script>";
            }

            $stmt->close();
            $conn->close();
            ?>
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
    