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
              <a href="dash.php">
                <i class='bx bxs-grid'></i>
                <span class="link_name">Dashboard</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a href="incoming.php">Incoming</a></li>
              <li><a href="outgoing.php">Outgoing</a></li>
              <li><a href="approved.php">Approved</a></li>
            </ul>
          </li>
    
    
          <li>
            <div class="iocn-link">
              <a href="user.php">
                <i class='bx bxs-user' ></i>
                <span class="link_name">Accounts</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a href="usersaccounts.php">Users</a></li>
              <li><a href="adminsaccounts.php">Admins</a></li>
              <li><a href="boss1accounts.php">Boss 1</a></li>
              <li><a href="boss2accounts.php">Boss 2</a></li>
              <li><a href="receivingaccounts.php">Receiving</a></li>
              <li><a href="proofreaderaccounts.php">Proof Reading</a></li>
            </ul>
          </li>
    
    
          <li>
            <a href="doc.html">
              <i class='bx bxs-file-plus' ></i>
              <span class="link_name">Upload Document</span>
            </a>
          </li>
    
          <li>
            <a href="adduser.html">
              <i class='bx bxs-user-plus' ></i>
              <span class="link_name">Add User</span>
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
            
        <!-- ========================= Incoming ==================== -->
            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>INCOMING</h2>


            <div class ="incoming">
            <?php
                session_start(); 
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

                $sql = "SELECT * FROM fileupload WHERE category = 'Incoming' AND status != 'Approved' LIMIT ? OFFSET ?";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    die("Error preparing statement: " . $conn->error);
                }
                $stmt->bind_param("ii", $rowsPerPage, $offset);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {                    
                    echo "<table>";
                    echo "<tr><th>Locator Number</th><th>Division</th><th>Section</th><th>Subject</th><th>Description</th><th>Receive From</th><th>Receive Date</th><th>Status</th><th>Action</th></tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><center>" . $row["locator_num"] . "</center></td>";
                        echo "<td><center>" . $row["division"] . "</center></td>";
                        echo "<td><center>" . $row["section"] . "</center></td>";
                        echo "<td><center>" . $row["subject"] . "</center></td>";
                        echo "<td><center>" . $row["description"] . "</center></td>";
                        echo "<td><center>" . $row["received_from"] . "</center></td>";
                        echo "<td><center>" . $row["received_date"] . "</center></td>";
                        echo "<td id='status'><center>" . $row["status"] . "</center></td>";
                        echo "<td>" ."<center>". "<a href='adminlocator.php?locator_num=" . htmlspecialchars($row["locator_num"]) . "' target='_self'>View</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                    $prevPage = $page - 1;
                    if ($prevPage > 0) {
                        echo "<a href='?page=$prevPage' id='prev'><ion-icon name='arrow-back-circle'></ion-icon></a>";
                    }
                    $nextPage = $page + 1;
                    echo "<a href='?page=$nextPage' id='next'><ion-icon name='arrow-forward-circle-sharp'></ion-icon></a>";
                } else {
                    echo "<p>No documents found.</p>";
                }

                $stmt->close();
                $conn->close();
            ?>


                    </div>
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
    