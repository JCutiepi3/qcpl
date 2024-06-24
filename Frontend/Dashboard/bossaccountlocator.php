<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>


     <!-- ======= Styles ====== -->
    <link rel="shortcut icon" type="image/x-icon" href="imgs/logo.png">
    <link rel="stylesheet" href="boss1.css">

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
              <a href="boss1account.php">
              <i class='bx bx-file-blank' ></i>
                <span class="link_name">Document</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a href="boss1incoming.php">Incoming</a></li>
              <li><a href="boss1outgoing.php">Outgoing</li>
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

         <!-- ========================= Documents ==================== -->
            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                        <h2>DOCUMENTS</h2>   
                </div>
                
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
                            echo "<p>Subject Description Receive from: " . $row["description"] . "</p>";
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
                            <?php
                            session_start();

                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "qcpl";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $locatorNum = isset($_GET['locator_num']) ? $_GET['locator_num'] : 'Not provided';
                            ?>

        <!DOCTYPE html>
        <html>
        <head>
          <title>Locator Number</title>
        </head>
        <body>  

        <form action="/qcpl/Backend/boss1backend.php" method="POST">
            <input type="hidden" name="locator_num" value="<?php echo htmlspecialchars($locatorNum); ?>">
            <select name="division" id="division" required onchange="updateSubdivision()">
                <option value="">Select Division</option>
                <option value="Readers Service Division">Readers Services Division</option>
                <option value="Technical Division">Technical Division</option>
                <option value="Library Extension Division">Library Extension Division</option>
                <option value="Publication Division">Publication Division</option>
                <option value="Administrative Services">Administrative Services</option>
                <option value="District Libraries Division">District Libraries Division</option>
            </select>
            <br>

            <div id="subdivisionOptions" style="display: none;">
                <label>Section: </label>
                <select name="section" id="subdivision" required>
                </select>
            </div>

            <script>
                function updateSubdivision() {
                    var division = document.getElementById("division").value;
                    var subdivisionOptions = document.getElementById("subdivisionOptions");

                    if (division === "") {
                        subdivisionOptions.style.display = "none";
                        return;
                    }

                    subdivisionOptions.style.display = "block";

                    var subdivisionSelect = document.getElementById("subdivision");

                    subdivisionSelect.innerHTML = "";

                    switch (division) {
                        case "Readers Service Division":
                            subdivisionSelect.add(new Option("Reference Section"));
                            subdivisionSelect.add(new Option("Filipiniana, Local History and Archives Section"));
                            subdivisionSelect.add(new Option("Law Research Section"));
                            subdivisionSelect.add(new Option("Periodical Section"));
                            subdivisionSelect.add(new Option("Childrens Section"));
                            subdivisionSelect.add(new Option("Management Information System Section"));
                            break;
                        case "Technical Division":
                            subdivisionSelect.add(new Option("Collection Development"));
                            subdivisionSelect.add(new Option("Cataloging Section"));
                            subdivisionSelect.add(new Option("Binding and Preservation Section"));
                            break;
                        case "Library Extension Division":
                            subdivisionSelect.add(new Option("Recreational"));
                            subdivisionSelect.add(new Option("Outreach"));
                            subdivisionSelect.add(new Option("Puppeteers"));
                            break;
                        case "Publication Division":
                            subdivisionSelect.add(new Option("Publishing Section"));
                            subdivisionSelect.add(new Option("Marketing Section"));
                            break;
                        case "Administrative Services":
                            subdivisionSelect.add(new Option("No Section"));
                            break;
                        case "District Libraries Division":
                            subdivisionSelect.add(new Option("Branch Libraries"));
                            break;
                        default:
                            break;
                    }
                }
            </script>
            <br>

            <textarea id="comment" name="comment" rows="4" cols="50" required></textarea>
            <br><br>
            
            <input type="hidden" id="status" name="status" value="pending">
            
            <button type="submit" name="submit" id="button">
    <ion-icon name="send-sharp"></ion-icon>
</button>
        </form>

        </div>             
<!-- ========================= Script ==================== -->
<script src="main.js"></script>

<!-- ========================= Ionicons ==================== -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>

</html>
