<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boss 2 Incoming</title>

    <!-- ======= Styles ====== -->
    <link rel="shortcut icon" type="image/x-icon" href="imgs/Logo.png">
    <link rel="stylesheet" href="boss2incoming.css">
</head>
<body>

     <!-- =============== Navigation ================ -->
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
                    <a href="boss2account.php">
                        <span class="icon">
                            <ion-icon name="documents-outline"></ion-icon>
                        </span>
                        <span class="title">Document<ion-icon id="dash_down_btn" name="caret-down-outline"></ion-icon</span>
                        <li class="sub_dash"><a href="boss2incoming.php">Incoming</a></li>
                         <li class="sub_dash"><a href="boss2outgoing.php">Outgoing</a></li>
                         </a>
                </li>

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
                    <h2>INCOMING</h2> 
                        </div>
                    <div class="sum_tb">
                        <table aria-describedby="tableDescription">
                            <?php
                            $server = "localhost";
                            $username = "root";
                            $password = "";
                            $db = "qcpl";
                            
                            $conn = new mysqli($server, $username, $password, $db);
                            
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            
                            $sql = "SELECT category, locator_num, received_date, received_from, type, file_path, boss2_comment, status FROM fileupload WHERE category = 'Incoming' AND status = 'Pending'";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) { 
                                echo "<table>";
                                echo "<tr><th>Category</th><th>Locator Number</th><th>Received Date</th><th>Received From</th><th>From Boss2 Comment</th><th>Type</th><th>File</th><th>Status</th><th>Action</th></tr>";
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" ."<center>". $row["category"] . "</td>";
                                    echo "<td>" ."<center>". $row["locator_num"] . "</td>";
                                    echo "<td>" ."<center>". $row["received_date"] . "</td>";
                                    echo "<td>" ."<center>". $row["received_from"] . "</td>";
                                    echo "<td>" ."<center>". $row["boss2_comment"] . "</td>";
                                    echo "<td>" ."<center>". $row["type"] . "</td>";
                                    echo "<td><a href='/qcpl/Backend/" . $row["file_path"] . "' target='_blank'>View File</a></td>";
                                    echo "<td>" . "<center>" . $row["status"] . "</td>";
                                    echo "<td>" ."<center>". "<a href='boss2accountlocator.php?locator_num=" . htmlspecialchars($row["locator_num"]) . "' target='_self'>View</a></td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            } else {
                              echo "<tr><td colspan='9'>No records found.</td></tr>";
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