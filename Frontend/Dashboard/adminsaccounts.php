<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_admins = "SELECT * FROM admins";
$result_admins = $conn->query($sql_admins);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>

    <!-- ======= Styles ====== -->
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
                    <a href="dash.php">
                        <span class="icon"><ion-icon name="apps"></ion-icon></ion-icon></span>
                        <span class="title">Dashboard</span>
                        <ion-icon id="down_btn" name="caret-down-outline"></ion-icon></span>
                    </a>

                         <li class="sub_dash"><a href="incoming.php">Incoming</a></li>
                         <li class="sub_dash"><a href="outgoing.php">Outgoing</a></li>
                    </a>
                </li>
                <li>

                    <a href="user.php">
                        <span class="icon"><ion-icon name="people"></ion-icon></span>
                        <span class="title">Accounts</span>
                        <ion-icon id="down_btn" name="caret-down-outline"></ion-icon></span>
                    </a>

                         <li class="sub_dash"><a href="usersaccounts.php">Users</a></li>
                         <li class="sub_dash"><a href="adminsaccounts.php">Admins</a></li>
                         <li class="sub_dash"><a href="boss1accounts.php">Boss 1</a></li>
                         <li class="sub_dash"><a href="outgoing.php">Boss 2</a></li>
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

                <div class="user">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                </div>
            </div>

            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>ADMINS</h2>
                    </div>
                </div>
            </div>



        <div class="accts_admin">
    
        <?php
        if ($result_admins->num_rows > 0) {
            echo "<table aria-describedby='admin-table'>";
            echo "<tr><th>ID</th><th>Name</th><th>Division</th><th>Username</th><th>Password</th><th colspan='2'>Action</th></tr>";
            echo "<tbody>";
            while ($row = $result_admins->fetch_assoc()) {
                echo "<tr>";
                echo "<td><center>" .  htmlspecialchars($row["id"]) . "</td>";
                echo "<td><center>" . htmlspecialchars($row["name"]) . "</td>";
                echo "<td><center>" . htmlspecialchars($row["division"]) . "</td>";
                echo "<td><center>" . htmlspecialchars($row["username"]) . "</td>";
                echo "<td><center>" . str_repeat("*", strlen($row["password"])) . "</td>";
                echo "<td id='ad_edit'><center><a href='updateuseradmin.php?id=" . htmlspecialchars($row["id"]) . "'>Edit</a></td>";
                echo "<td id='ad_delete'><center><a href='deleteuseradmin.php?id=" . htmlspecialchars($row["id"]) . "'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No admins found.</p>";
        }
        $conn->close();
        ?>
        </div>
          

  
               
    <!-- =========== Scripts =========  -->
    <script src="main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>