<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>


     <!-- ======= Styles ====== -->
    <link rel="shortcut icon" type="image/x-icon" href="img/Logo.png">
    <link rel="stylesheet" href="userdashboard.css">

    <!-- ======= Boxiocns ====== -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

     <!-- =============== Navigation ================ -->
     <div class="sidebar close">
        <div class="logo-details">
            <span class="img">
                <img src="img/Logo.png" >
            </span>
          <span class="logo_name">Quezon City Public Library</span>
        </div>
        
        <ul class="nav-links">
    
          
          <li>
            <div class="iocn-link">
              <a href="userdashboard.php">
                <i class='bx bxs-grid'></i>
                <span class="link_name">Dashboard</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a href="userincomingdash.php">Incoming</a></li>
              <li><a href="useroutgoingdash.php">Outgoing</a></li>
              <li><a href="userapprovedash.php">Approved</a></li>
            </ul>
          </li>

    
          <li>
            <a href="useroutgoing.php">
              <i class='bx bxs-file-plus' ></i>
              <span class="link_name">Upload Document</span>
            </a>
          </li>

    
          <li>
            <a href="/qcpl/Backend/logout.php">
              <i class='bx bxs-log-out' ></i>
              <span class="link_name">Sign Out</span>
            </a>
          </li>
    
      </li>
      </ul>
      </div>

        <!-- ========================= Main ==================== -->
        <section class="home-section">
            <div class="home-content">
              <i class='bx bx-menu' ></i>
        
            </div>
                
            <form action="/qcpl/Backend/locator.php" method="GET">
                <div class="search">
                    <label>
                        <input type="number" name="locator" placeholder="Search here">
                        <input type="submit" id="sub_hide" name="find">
                        <ion-icon name="search-outline" name="locate"></ion-icon>
                    </label>
                </div>
            </form>
               



         <!-- ========================= Summary ==================== -->
            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>DOCUMENTS</h2>   
                        </div>
                    <div class="sum_tb">
                        <table aria-describedby="tableDescription">
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

                            $sql = "SELECT `locator_num`, `category`, `subject`, `description`, `received_from`, `received_date`, `proofreader_comment`, `boss2_comment`, `boss1_comment`, `type`, `file_path`, `status` FROM fileupload WHERE `locator_num` = '$locator_num'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table border='1'>";
                                while($row = $result->fetch_assoc()) {
                                    echo "<h1>Locator Number: " . $row["locator_num"] . "</h1>";
                                    echo "<p>Category: " . $row["category"] . "</p>";
                                    echo "<p>Subject: " . $row["subject"] . "</p>";
                                    echo "<p>Description: " . $row["description"] . "</p>";
                                    echo "<p>Receive from: " . $row["received_from"] . "</p>";
                                    echo "<p>Receive Date: " . $row["received_date"] . "</p>";
                                    echo "<p>Proofreader Comment: " . $row["proofreader_comment"] . "</p>";
                                    echo "<p>Boss 2 Comment: " . $row["boss2_comment"] . "</p>";
                                    echo "<p>Boss 1 Comment: " . $row["boss1_comment"] . "</p>";
                                    echo "<p>File Type: " . $row["type"] . "</p>";
                                    echo "<td><center><a href='/qcpl/Backend/" . $row["file_path"] . "' target='_self'>View File</a></td>";
                                    echo "<p>Status: " . $row["status"] . "</p>";
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                    </div> 
                </div>
            </div>
        </section>

<!-- ========================= Script ==================== -->
<script src="main.js"></script>

<!-- ========================= Ionicons ==================== -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>