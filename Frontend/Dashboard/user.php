<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
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
                        <span class="icon">
                            <ion-icon name="apps"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

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

                <form action="/qcpl/Backend/userslocator.php" method="GET">
                    <div class="search">
                        <label>
                            <input type="number" name="id" placeholder="Search here">
                            <input type="submit" id="sub_hide" name="find">
                            <ion-icon name="search-outline" name="find"></ion-icon>
                        </label>
                    </div>
                </form>

                <div class="user">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>

                    </span>
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

            $sql_users = "SELECT * FROM users";
            $result_users = $conn->query($sql_users);

            $sql_admins = "SELECT * FROM admins";
            $result_admins = $conn->query($sql_admins);

            if ($result_users->num_rows > 0) {
                echo "<h2>Users</h2>";
                echo "<table>";
                echo '<tr><th>ID</th><th>Name</th><th>Username</th><th>Password</th><th colspan="2">Action</th></tr>';
                
                // Initialize variable to track the number of rows displayed
                $rowCount = 0;
                
                // Loop through the result set
                while ($row = $result_users->fetch_assoc()) {
                    // Display only the first 4 rows
                    if ($rowCount < 4) {
                        echo "<tr>";
                        echo "<td>" . "<center>" . $row["id"] . "</td>";
                        echo "<td>" . "<center>" . $row["name"] . "</td>";
                        echo "<td>" . "<center>" . $row["username"] . "</td>";
                        echo "<td>" . "<center>" . str_repeat("*", strlen($row["password"])) . "</td>";
                        echo "<td><center><a href='updateuseradmin.php?id=" . $row["id"] . "'>Edit</a></td>";
                        echo "<td><center><a href='deleteuseradmin.php?id=" . $row["id"] . "'>Delete</a></td>";
                        echo "</tr>";
                        
                        // Increment the row count
                        $rowCount++;
                    }
                }
                
                echo "</table>";
            }

            if ($result_users->num_rows > 0) {
                echo "<h2><br><br>Users</h2>";
                echo "<table>";
                echo '<tr><th>ID</th><th>Name</th><th>Username</th><th>Password</th><th colspan="2">Action</th></tr>';
                
                // Initialize variable to track the number of rows displayed
                $rowCount = 0;
                
                // Loop through the result set
                while ($row = $result_admins->fetch_assoc()) {
                    // Display only the first 4 rows
                    if ($rowCount < 4) {
                        echo "<tr>";
                        echo "<td>" . "<center>" . $row["id"] . "</td>";
                        echo "<td>" . "<center>" . $row["name"] . "</td>";
                        echo "<td>" . "<center>" . $row["username"] . "</td>";
                        echo "<td>" . "<center>" . str_repeat("*", strlen($row["password"])) . "</td>";
                        echo "<td><center><a href='updateuseradmin.php?id=" . $row["id"] . "'>Edit</a></td>";
                        echo "<td><center><a href='deleteuseradmin.php?id=" . $row["id"] . "'>Delete</a></td>";
                        echo "</tr>";
                        
                        // Increment the row count
                        $rowCount++;
                    }
                    
                }
                
                echo "</table>";
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

<?php
if (isset($_GET['delete_msg'])){
    echo "<h6>".$_GET['delete_msg']."</h6>";
}
?>
