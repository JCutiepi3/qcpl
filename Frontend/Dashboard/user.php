<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <!-- Styles -->
    <link rel="shortcut icon" type="image/x-icon" href="imgs/logo.png">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navigation -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="img">
                            <img src="imgs/logo.png">
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
                         <li class="sub_dash"><a href="boss2accounts.php">Boss 2</a></li>
                    </a>
                </li>
                <li>
                    <a href="doc.html">
                        <span class="icon"><ion-icon name="add-circle"></ion-icon></span>
                        <span class="title">Upload Document</span>
                    </a>
                </li>
                <li>
                    <a href="adduser.html">
                        <span class="icon"><ion-icon name="person-add"></ion-icon></span>
                        <span class="title">Add User</span>
                    </a>
                </li>

                <li>
                    <a href="/qcpl/Backend/logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="main">
            <div class="topbar">
                <div class="toggle"><ion-icon name="menu-outline"></ion-icon></div>
                <form action="/qcpl/Backend/accountlocator.php" method="GET" class="search">
                    <label>
                        <input type="text" name="name" placeholder="Search here">
                        <input type="submit" id="sub_hide" name="finder">
                        <ion-icon name="search-outline" name="find"></ion-icon>
                    </label>
                </form>
                <div class="user"><span class="icon"><ion-icon name="person"></ion-icon></span></div>
            </div>

            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>ACCOUNTS</h2>
                    </div>
                </div>
            </div>


            <div class="findaccount">
            <?php
                $server = "localhost";
                $username = "root";
                $password = "";
                $db = "qcpl";

                $conn = new mysqli($server, $username, $password, $db);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $rowsPerPage = 4;
                $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                $offset = ($page - 1) * $rowsPerPage;

                $sql = "SELECT id, name, division, username, password, 'Admin' as role FROM admins
                        UNION ALL
                        SELECT id, name, division, username, password, 'User' as role FROM users
                        UNION ALL
                        SELECT id, name, division, username, password, 'Boss1' as role FROM boss1
                        UNION ALL
                        SELECT id, name, division, username, password, 'Boss2' as role FROM boss2
                        LIMIT ? OFFSET ?";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii", $rowsPerPage, $offset);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<table style='width:100%; text-align:center;'>";
                    echo "<tr><th>Role</th><th>Name</th><th>Division</th><th>Username</th><th>Password</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["role"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["division"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                        echo "<td>" . str_repeat("*", strlen($row["password"])) . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo '<div style="text-align:center; margin-top:20px;">';
                    if ($page > 1) {
                        echo '<a href="?page=' . ($page - 1) . '">Previous</a>';
                    }
                    echo ' | ';
                    echo '<a href="?page=' . ($page + 1) . '">Next</a>';
                    echo '</div>';
                } else {
                    echo "<script>alert('No Account Found!'); window.location.href = '?page=1';</script>";
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

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this account?")) {
                window.location.href = 'deleteuseradmin.php?id=' + id;
            }
        }
        function confirmUpdate(id) {
        if (confirm("Are you sure you want to update?")) {
            window.location.href = 'updateuseradmin.php?id=' + id; 
        }
    }
</script>

    </script>

    <?php
    if (isset($_GET['delete_msg'])){
        echo "<h6>".$_GET['delete_msg']."</h6>";
    }
    ?>
    
    
</body>

</html>


