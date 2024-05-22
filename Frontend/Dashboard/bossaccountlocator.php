<!DOCTYPE html>
<html>
<head>
  <title>Locator Number</title>
</head>
<body>

<?php
// Retrieve the locator number from the query parameter
if(isset($_GET['locator_num'])){
    $locatorNum = $_GET['locator_num'];
    // Display the locator number
    echo "<h1>Locator Number: $locatorNum</h1>";
} else {
    echo "Locator number not provided.";
}
?>
<form action="/qcpl/Backend/boss1backend.php" method="POST">
    <input type="hidden" name="locator_num" value="<?php echo $locatorNum ?>">
  </select><label>Division: </label>
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
                            subdivisionSelect.add(new Option("Recreational",));
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
                        
                        default:
                            break;
                    }
                }
            </script>
  <br>

  <label for="comment">Comment:</label><br>
  <textarea id="comment" name="comment" rows="4" cols="50" required></textarea>
  <br><br>
  
  <label>Status: </label>
<input type="radio" id="pending" name="status" value="pending" required>
<label for="pending">Pending</label>

<input type="radio" id="processing" name="status" value="processing">
<label for="processing">Processing</label>

<input type="radio" id="completed" name="status" value="completed">
<label for="completed">Completed</label><br>



  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>

<table>
    <tr>
      <th>Boss 2 Comment</th>
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
if (!isset($_SESSION['name'])) {
    // Redirect to login page if user is not logged in
    header("Location: ../login.html");
    exit();
}

$sql = "SELECT boss2_comment, status FROM fileupload"; // Idagdag ang status sa iyong query

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        if (isset($row["status"]) && $row["status"] == "pending") { // Siguraduhing mayroong "status" at ito ay "pending" bago ma-display ang boss2_comment
            echo "<td>" . "<center>" . $row["boss2_comment"] . "</td>";
        } else {
            echo "<td>No comment available for this row.</td>";
        }
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No records found.</td></tr>";
}

$conn->close();
?>
