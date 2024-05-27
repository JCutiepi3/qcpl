<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- ======= Styles ====== -->
    <link rel="shortcut icon" type="image/x-icon" href="Dashboard/imgs/logo.png">
    <link rel="stylesheet" href="boss1.css">
</head>

<body>

    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="img">
                            <img src="Dashboard/imgs/logo.png" >
                        </span>
                        <span class="title">Quezon City Public Library</span>
                    </a>
                </li>
                
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="documents-outline"></ion-icon>
                        </span>
                        <span class="title">Document</span>
                    </a>
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
                
            <form action="/qcpl/Backend/locator.php" method="GET">
                <div class="search">
                    <label>
                        <input type="number" name="locator" placeholder="Search here">
                        <input type="submit" id="sub_hide" name="find">
                        <ion-icon name="search-outline" name="locate"></ion-icon>
                    </label>
                </div>
            </form>
               

                <div class="user">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>

                </div>
            </div>

            <div class="details">
                <div class="upload">
                    <div class="cardHeader">
                    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boss 2</title>
</head>
<body>

  <h1>Locator Numbers</h1>

  <table>
    <tr>
      <th><center>Category</th>
      <th><center>Locator Number</th>
      <th><center>Received Date</th>
      <th><center>Received From</th>
      <th><center>Boss2 Comment</th>
      <th><center>Type</th>
      <th><center>File</th>
      <th><center>Status</th>
      <th><center>Action</th>
    </tr>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qcpl";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT category, locator_num, received_date, received_from, type, file_path, boss2_comment, status FROM fileupload WHERE status = 'Pending'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><center>" . htmlspecialchars($row["category"]) . "</td>";
        echo "<td><center>" . htmlspecialchars($row["locator_num"]) . "</td>";
        echo "<td><center>" . htmlspecialchars($row["received_date"]) . "</td>";
        echo "<td><center>" . htmlspecialchars($row["received_from"]) . "</td>";
        echo "<td><center>" . htmlspecialchars($row["boss2_comment"]) . "</td>";
        echo "<td><center>" . htmlspecialchars($row["type"]) . "</td>";
        echo "<td id ='file'><a href='/qcpl/Backend/" . $row["file_path"] . "' target='_blank'><center>View File</a></td>";
        echo "<td><center>" . htmlspecialchars($row["status"]) . "</td><center>";
        echo "<td><center><a href='boss2accountlocator.php?locator_num=" . htmlspecialchars($row["locator_num"]) . "' target='_self'>View</a></td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='8'>No records found.</td></tr>";
    }

    $conn->close();
    ?>

  </table>

</body>
</html>
               
    <!-- =========== Scripts =========  -->
    <script src="main.js"></script>

    <script>// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.focus("hovered")

  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};</script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>