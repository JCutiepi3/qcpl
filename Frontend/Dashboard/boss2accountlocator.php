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
<form action="/qcpl/Backend/boss2backend.php" method="POST">
    <input type="hidden" name="locator_num" value="<?php echo $locatorNum ?>">

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
<br>
<br>
        <input type="submit" value="Submit">
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

<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
}
