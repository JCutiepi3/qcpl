<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View and Submit</title>
</head>
<body>
    <!-- View Button -->
    <button onclick="viewDocument()">View Document</button>

    <!-- Comment Form -->
    <form action="submit.php" method="post">
        <!-- Comment Box (required) -->
        <textarea id="commentBox" name="comment" rows="4" cols="50" placeholder="Enter your comment here..." required></textarea>

        <!-- Submit Button -->
        <br>
        <input type="submit" value="Submit">
    </form><!DOCTYPE html>
<html>
<head>
  <title>Boss 1</title>
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
      <th>File</th>
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
        echo "<td><a href='/qcpl/Backend/" . $row["file_path"] . "' target='_blank'>View File</a></td>";
        echo "<td><a href='bossaccountlocator.php?locator_num=" . $row["locator_num"] . "' target='_self'>UPDATE</a></td>";
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
