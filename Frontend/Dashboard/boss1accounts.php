<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_boss1 = "SELECT * FROM boss1";
$result_boss1 = $conn->query($sql_boss1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Account</title>


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

    <!-- ========================= Account Boss1 ==================== -->

            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>BOSS 1</h2>
                        <div class ="accts_boss1">
                        <?php
                            $rowsPerPage = 4;
                            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                            $offset = ($page - 1) * $rowsPerPage;

                            $sql = "SELECT id, name, division, username, password FROM boss1 LIMIT ? OFFSET ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ii", $rowsPerPage, $offset);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            
                            if ($result->num_rows > 0) {
                                echo "<table aria-describedby='boss1-table'>";
                                echo "<tr><th>ID</th><th>Name</th><th>Division</th><th>Username</th><th>Password</th><th colspan='2'>Action</th></tr>";
                                echo "<tbody>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td><center>" . htmlspecialchars($row["id"]) . "</td>";
                                    echo "<td><center>" . htmlspecialchars($row["name"]) . "</td>";
                                    echo "<td><center>" . htmlspecialchars($row["division"]) . "</td>";
                                    echo "<td><center>" . htmlspecialchars($row["username"]) . "</td>";
                                    echo "<td><center>" . str_repeat("*", strlen($row["password"])) . "</td>";
                                    echo "<td id='boss1_edit'><center><a href='/qcpl/Backend/updateboss1account.php?id=" . htmlspecialchars($row["id"]) . "'>Edit</a></td>";
                                    echo "<td id='boss1_delete'><center><a href='#' onclick='confirmDeleteBoss1(" . htmlspecialchars($row["id"]) . ")'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                            
                                $prevPage = $page - 1;
                                if ($prevPage > 0) {
                                    echo "<a href='?page=$prevPage' id='prev'><ion-icon name='arrow-back-circle'></ion-icon></a>";
                                }
                                $nextPage = $page + 1;
                                echo "<a href='?page=$nextPage' id='next' > <ion-icon name='arrow-forward-circle-sharp'></ion-icon></a>";
                            } else {
                                echo "No Boss 1 Account found!";
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- ========================= Ionicons ==================== -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


<!-- ========================= SweetAlert2 Delete Confirmation ==================== -->
<script>
function confirmDeleteBoss1(boss1Id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
            }).then(() => {
                window.location.href = '/qcpl/Backend/deleteaccount.php?id=' + boss1Id;
            });
        }
    });
}
</script>
                        
                        
</body>
</html>
                        