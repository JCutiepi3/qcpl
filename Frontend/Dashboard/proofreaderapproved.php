<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>


     <!-- ======= Styles ====== -->
    <link rel="shortcut icon" type="image/x-icon" href="imgs/logo.png">
    <link rel="stylesheet" href="style.css">

    <!-- ======= Boxiocns ====== -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

     <!-- =============== Navigation ================ -->
     <div class="sidebar close">
        <div class="logo-details">
            <span class="img">
                <img src="imgs/logo.png" >
            </span>
          <span class="logo_name">Quezon City Public Library</span>
        </div>
        
        <ul class="nav-links">
    
          
          <li>
            <div class="iocn-link">
              <a href="proofviewdocument.php">
              <i class='bx bx-file-blank'></i>
                <span class="link_name">Documents</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a href="proofreaderapproved.php">Approved</a></li>
            </ul>
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

         <!-- ========================= Proofread Account ==================== -->
            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>APPROVED</h2>
            <div class ="summary">
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

                    $rowsPerPage = 4;
                    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                    $offset = ($page - 1) * $rowsPerPage;

                    $sql = "SELECT * FROM fileupload WHERE status = 'Approved' LIMIT $rowsPerPage OFFSET $offset";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<thead><tr><th>Locator Number</th><th>Subject</th><th>Description</th><th>Division</th><th>Section</th><th>Received From</th><th>Received Date</th><th>Status</th><th>Action</th></tr></thead>";
                        echo "<tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><center>" . htmlspecialchars($row["locator_num"]) . "</td>";
                            echo "<td><center>" . htmlspecialchars($row["subject"]) . "</td>";
                            echo "<td><center>" . htmlspecialchars($row["description"]) . "</td>";
                            echo "<td><center>" . htmlspecialchars($row["division"]) . "</td>";
                            echo "<td><center>" . htmlspecialchars($row["section"]) . "</td>";
                            echo "<td><center>" . htmlspecialchars($row["received_from"]) . "</td>";
                            echo "<td><center>" . htmlspecialchars($row["received_date"]) . "</td>";
                            echo "<td><center>" . htmlspecialchars($row["status"]) . "</td>";
                            echo "<td><center><a href='approveddocuments.php?locator_num=" . htmlspecialchars($row["locator_num"]) . "' target='_self' aria-label='View details for " . htmlspecialchars($row["locator_num"]) . "'>View</a></td>";
                            echo "</tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";

                        // Pagination logic
                        $sql_count = "SELECT COUNT(*) AS total_count FROM fileupload WHERE status = 'Approved'";
                        $result_count = $conn->query($sql_count);
                        $row_count = $result_count->fetch_assoc();
                        $total_records = $row_count['total_count'];
                        $total_pages = ceil($total_records / $rowsPerPage);

                        // Display pagination links
                        if ($total_pages > 1) {
                            echo "<div style='text-align: center; margin-top: 20px;'>";
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<a href='?page=$i'>" . $i . "</a> ";
                            }
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No records found.</p>";
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
    