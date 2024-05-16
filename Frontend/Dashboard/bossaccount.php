<!DOCTYPE html>
<html>
<head>
  <title>Display Locator Number</title>
</head>
<body>

  <h1>Locator Numbers</h1>

  <table>
    <tr>
      <th>Owner</th>
      <th>Division</th>
      <th>Section</th>
      <th>Category</th>
      <th>Locator Number</th>
      <th>Received Date</th>
      <th>Received From</th>
      <th>Type</th>
      <th>File</th>
    </tr>

    <?php

    // Include your database connection details (replace with your actual credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qcpl";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Define your SQL query to select the desired data
    $sql = "SELECT owner, division, section, category, locator_num, received_date, received_from, type, file_path FROM fileupload";

    // Perform the query
    $result = $conn->query($sql);

    // Check query results
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . "<center>" . $row["owner"] . "</td>";
        echo "<td>" . "<center>" . $row["division"] . "</td>";
        echo "<td>" . "<center>" . $row["section"] . "</td>";
        echo "<td>" . "<center>" . $row["category"] . "</td>";
        echo "<td>" . "<center>" . $row["locator_num"] . "</td>";
        echo "<td>" . "<center>" . $row["received_date"] . "</td>";
        echo "<td>" . "<center>" . $row["received_from"] . "</td>";
        echo "<td>" . "<center>" . $row["type"] . "</td>";
        echo "<td><a href='bossaccountlocator.php?locator_num=" . $row["locator_num"] . "' target='_blank'>View Locator Number</a></td>";
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
