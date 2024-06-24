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
                
         <!-- ========================= User Incoming ==================== -->
            <div class="details2">
                <div class="upload2">
                    <div class="cardHeader2">
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

                            $rowsPerPage = 4;

                            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

                            $offset = ($page - 1) * $rowsPerPage;

                            $sql = "SELECT division, section, category, locator_num, received_date, received_from, status FROM fileupload WHERE category='Incoming' LIMIT $rowsPerPage OFFSET $offset";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<table>";
                                echo "<tr><th>Locator Number</th><th>Division</th><th>Section</th><th>Received From</th><th>Received Date</th><th>Category</th><th>Status</th><th>Action</th></tr>";

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row["locator_num"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["division"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["section"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["received_from"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["received_date"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["category"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
                                    echo "<td id='table_th'><center><a href='useraccountlocator.php?locator_num=" . htmlspecialchars($row["locator_num"]) . "' target='_self' aria-label='View details for " . htmlspecialchars($row["locator_num"]) . "'>View</a></td>";
                                    echo "</tr>";
                                }

                                echo "</table>";

                                $sql_count = "SELECT COUNT(*) AS total_count FROM fileupload WHERE category='Incoming'";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();
                                $total_records = $row_count['total_count'];
                                $total_pages = ceil($total_records / $rowsPerPage);

                                echo "<div style='text-align: center; margin-top: 20px;'>";
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    echo "<a href='?page=$i'>" . $i . "</a> ";
                                }
                                echo "</div>";
                            } else {
                                echo "<script>alert('No documents found!');</script>";
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