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
                        <span class="icon"><ion-icon name="apps"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <span class="icon"><ion-icon name="people"></ion-icon></span>
                        <span class="title">Users</span>
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
                    <a href="faqs.html">
                        <span class="icon"><ion-icon name="help"></ion-icon></span>
                        <span class="title">FAQs</span>
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
                <form action="/qcpl/Backend/userslocator.php" method="GET" class="search">
                    <label>
                        <input type="number" name="id" placeholder="Search here">
                        <input type="submit" id="sub_hide" name="find">
                        <ion-icon name="search-outline" name="find"></ion-icon>
                    </label>
                </form>
                <div class="user"><span class="icon"><ion-icon name="person"></ion-icon></span></div>
            </div>

            <div class="details">
                <div class="upload"></div>
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

                $sql_users = "SELECT * FROM users";
                $result_users = $conn->query($sql_users);

                $sql_admins = "SELECT * FROM admins";
                $result_admins = $conn->query($sql_admins);

                $sql_boss1 = "SELECT * FROM boss1";
                $result_boss1 = $conn->query($sql_boss1);

                $sql_boss2 = "SELECT * FROM boss2";
                $result_boss2 = $conn->query($sql_boss2);

                if ($result_admins->num_rows > 0) {
                    echo "<h2><br><br><br><br><br><br><br><br><br><br><br><br><br><br>Accounts</h2>";
                    echo "<h2>ADMINS</h2>";
                    echo "<table>";
                    echo '<tr><th>ID</th><th>Name</th><th>Division</th><th>Username</th><th>Password</th><th colspan="2">Action</th></tr>';
                    $rowCount = 0;
                    while ($row = $result_admins->fetch_assoc()) {
                        if ($rowCount < 4) {
                            echo "<tr>";
                            echo "<td><center>" . $row["id"] . "</td>";
                            echo "<td><center>" . $row["name"] . "</td>";
                            echo "<td><center>" . $row["division"] . "</td>";
                            echo "<td><center>" . $row["username"] . "</td>";
                            echo "<td><center>" . str_repeat("*", strlen($row["password"])) . "</td>";
                            echo "<td id ='ad_edit'><center><a href='javascript:void(0);' onclick='confirmUpdate(" . $row["id"] . ")'>Edit</a></td>";
                            echo "<td id ='ad_delete'><center><a href='javascript:void(0);' onclick='confirmDelete(" . $row["id"] . ")'>Delete</a></td>";

                            echo "<td><center><a href='updateuseradmin.php?id=" . $row["id"] . "'>Edit</a></td>";
                            echo "<td><center><a href='deleteuseradmin.php?id=" . $row["id"] . "'>Delete</a></td>";
                            echo "</tr>";
                            $rowCount++;
                        }
                    }
                    echo "</table>";
                }
                if ($result_users->num_rows > 0) {
                    echo "<h2>USERS</h2>";
                    echo "<table>";
                    echo '<tr><th>ID</th><th>Name</th><th>Division</th><th>Username</th><th>Password</th><th colspan="2">Action</th></tr>';
                    $rowCount = 0;
                    while ($row = $result_users->fetch_assoc()) {
                        if ($rowCount < 4) {
                            echo "<tr>";
                            echo "<td><center>" . $row["id"] . "</td>";
                            echo "<td><center>" . $row["name"] . "</td>";
                            echo "<td><center>" . $row["division"] . "</td>";
                            echo "<td><center>" . $row["username"] . "</td>";
                            echo "<td><center>" . str_repeat("*", strlen($row["password"])) . "</td>";
                            echo "<td id = 'us_edit'><center><a href='updateuseradmin.php?id=" . $row["id"] . "'>Edit</a></td>";
                            echo "<td id = 'us_delete'><center><a href='deleteuseradmin.php?id=" . $row["id"] . "'>Delete</a></td>";
                            echo "</tr>";
                            $rowCount++;
                        }
                    }
                     echo "</table>";
                    if ($result_boss1->num_rows > 0) {
                        echo "<h2>BOSS 1</h2>";
                        echo "<table>";
                        echo '<tr><th>ID</th><th>Name</th><th>Division</th><th>Username</th><th>Password</th><th colspan="2">Action</th></tr>';
                        $rowCount = 0;
                        while ($row = $result_boss1->fetch_assoc()) {
                            if ($rowCount < 4) {
                                echo "<tr>";
                                echo "<td><center>" . $row["id"] . "</td>";
                                echo "<td><center>" . $row["name"] . "</td>";
                                echo "<td><center>" . $row["division"] . "</td>";
                                echo "<td><center>" . $row["username"] . "</td>";
                                echo "<td><center>" . str_repeat("*", strlen($row["password"])) . "</td>";
                                echo "<td><center><a href='updateuseradmin.php?id=" . $row["id"] . "'>Edit</a></td>";
                                echo "<td><center><a href='deleteuseradmin.php?id=" . $row["id"] . "'>Delete</a></td>";
                                echo "</tr>";
                                $rowCount++;
                            }
                        }
                        echo "</table>";
                    }
                    if ($result_boss2->num_rows > 0) {
                        echo "<h2>BOSS 2</h2>";
                        echo "<table>";
                        echo '<tr><th>ID</th><th>Name</th><th>Division</th><th>Username</th><th>Password</th><th colspan="2">Action</th></tr>';
                        $rowCount = 0;
                        while ($row = $result_boss2->fetch_assoc()) {
                            if ($rowCount < 4) {
                                echo "<tr>";
                                echo "<td><center>" . $row["id"] . "</td>";
                                echo "<td><center>" . $row["name"] . "</td>";
                                echo "<td><center>" . $row["division"] . "</td>";
                                echo "<td><center>" . $row["username"] . "</td>";
                                echo "<td><center>" . str_repeat("*", strlen($row["password"])) . "</td>";
                                echo "<td><center><a href='updateuseradmin.php?id=" . $row["id"] . "'>Edit</a></td>";
                                echo "<td><center><a href='deleteuseradmin.php?id=" . $row["id"] . "'>Delete</a></td>";
                                echo "</tr>";
                                $rowCount++;
                            }
                        }
                        echo "</table>";
                    }
                }
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
            window.location.href = 'updateuseradmin.php?id=' + id; // Redirect to updateuseradmin.php with ID
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
