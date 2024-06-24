<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>


     <!-- ======= Styles ====== -->
    <link rel="shortcut icon" type="image/x-icon" href="imgs/logo.png">
    <link rel="stylesheet" href="boss2account.css">

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
              <a href="boss2account.php">
              <i class='bx bx-file-blank' ></i>
                <span class="link_name">Document</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a href="boss2incoming.php">Incoming</a></li>
              <li><a href="boss2outgoing.php">Outgoing</li>
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

         <!-- ========================= Boss2 Locator ==================== -->

            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>DOCUMENTS</h2>   
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
                    <div class="table">
                        
    <table class="table_th">


        <divdiv id="multiStepForm">    
       <div>
<html>
<head>
  <title>Boss 2 Locator</title>
</head>
<body>

<?php
if(isset($_GET['locator_num'])){
    $locatorNum = $_GET['locator_num'];
    echo "<h1>Locator Number: $locatorNum</h1>";
} else {
    echo "Locator number not provided.";
}
?>
<html>
<head>
  <title>Boss 2 Locator</title>
</head>
<body>

<form action="/qcpl/Backend/boss2backend.php" method="POST">
    <input type="hidden" name="locator_num" value="<?php echo $locatorNum ?>">

    <br>
    <label for="comment" required>Comment:</label><br>
    <textarea id="comment" name="comment" rows="4" cols="50" required></textarea>
    <br>
    <br>
    <input type="submit" value="Submit" name="submit">
</form>

</body>
</html>

    <script>
        function viewDocument() {
            window.open('document_path', '_blank');
        }
    </script>
</body>
</html>
               
    <!-- ========================= Script ==================== -->
<script src="main.js"></script>

<!-- ========================= Ionicons ==================== -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>