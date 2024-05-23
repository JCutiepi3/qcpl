<!DOCTYPE html>
<html>
<head>
  <title>Boss 2</title>
</head>
<body>

  <h1>Locator Numbers</h1>

  <table>
    <tr>
      <th>Category</th>
      <th>Locator Number</th>
      <th>Received Date</th>
      <th>Received From</th>
      <th>Type</th>
      <th>Comment</th>
      <th>Status</th>
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
  //   if (!isset($_SESSION['name'])) {
  //     // Redirect to login page if user is not logged in
  //     header("Location: ../login.html");
  //     exit();
  // }
    
    $sql = "SELECT category, locator_num, received_date, received_from, type, file_path, status FROM fileupload";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . "<center>" . $row["category"] . "</td>";
        echo "<td>" . "<center>" . $row["locator_num"] . "</td>";
        echo "<td>" . "<center>" . $row["received_date"] . "</td>";
        echo "<td>" . "<center>" . $row["received_from"] . "</td>";
        echo "<td>" . "<center>" . $row["type"] . "</td>";
        echo "<td><a href='boss2accountlocator.php?locator_num=" . $row["locator_num"] . "' target='_self'>ADD</a></td>";
        echo "<td>" . "<center>" . $row["status"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='9'>No records found.</td></tr>";
    }

    $conn->close();

    ?>

  </table>

</body>
</html>


    <script>
        // Function to view document (replace 'document_path' with the actual document path)
        function viewDocument() {
            window.open('document_path', '_blank');
        }
    </script>
</body>
</html>
