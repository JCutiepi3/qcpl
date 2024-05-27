<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boss 2</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    a {
      color: #0000EE; 
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
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