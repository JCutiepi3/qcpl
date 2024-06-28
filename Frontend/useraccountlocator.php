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
         <?php
if(isset($_GET['locator_num'])) {
    $locator_num = $_GET['locator_num'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qcpl";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT `locator_num`, `category`, `subject`, `description`, `received_from`, `received_date`, `proofreader_comment`, `boss2_comment`, `boss1_comment`, `type`, `file_path`, `status` FROM fileupload WHERE `locator_num` = '$locator_num'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetching the first row assuming locator_num is unique
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2, h3 {
            color: #003366;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #003366;
            color: #fff;
        }
        td {
            background-color: #f9f9f9;
        }
        td a {
            color: #0066cc;
            text-decoration: none;
        }
        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Document Details</h1>
        <table>
            <tr>
                <th>Locator Number</th>
                <td><?php echo $row["locator_num"]; ?></td>
            </tr>
            <tr>
                <th>Category</th>
                <td><?php echo $row["category"]; ?></td>
            </tr>
            <tr>
                <th>Subject</th>
                <td><?php echo $row["subject"]; ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?php echo $row["description"]; ?></td>
            </tr>
            <tr>
                <th>Received From</th>
                <td><?php echo $row["received_from"]; ?></td>
            </tr>
            <tr>
                <th>Received Date</th>
                <td><?php echo $row["received_date"]; ?></td>
            </tr>
            <tr>
                <th>Proofreader Comment</th>
                <td><?php echo $row["proofreader_comment"]; ?></td>
            </tr>
            <tr>
                <th>Boss 2 Comment</th>
                <td><?php echo $row["boss2_comment"]; ?></td>
            </tr>
            <tr>
                <th>Boss 1 Comment</th>
                <td><?php echo $row["boss1_comment"]; ?></td>
            </tr>
            <tr>
                <th>File Type</th>
                <td><?php echo $row["type"]; ?></td>
            </tr>
            <tr>
                <th>File</th>
                <td><a href="/qcpl/Backend/<?php echo $row["file_path"]; ?>" target="_self">View File</a></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo $row["status"]; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
<?php
    } else {
        echo "0 results";
    }
    $conn->close();
} else {
    echo "Locator number not provided";
}
?>


<!-- ========================= Script ==================== -->
<script src="main.js"></script>

<!-- ========================= Ionicons ==================== -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>