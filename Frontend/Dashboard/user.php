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
                    <a href="home.html">
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
                            <input type="number" name="name" placeholder="Search here">
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
            
                $sql = "SELECT * FROM users UNION SELECT * FROM admins";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Name</th><th>Username</th><th>Password</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . "<center>" . $row["id"] . "</td>";
                        echo "<td>" . "<center>" . $row["name"] . "</td>";
                        echo "<td>" . "<center>" . $row["username"] . "</td>";
                        echo "<td>" . "<center>" . $row["password"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<script>alert('No document found!');</script>";
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