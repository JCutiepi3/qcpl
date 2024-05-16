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

<form action="submit_comment.php" method="post">
  <label for="dropdown1">Section:</label>
  <select id="dropdown1" name="dropdown1">
    <option value="option1">A</option>
    <option value="option2">B</option>
    <option value="option3">C</option>
  </select>
  <br><br>
  <label for="dropdown2">Division:</label>
  <select id="dropdown2" name="dropdown2">
    <option value="option1">1</option>
    <option value="option2">2</option>
    <option value="option3">3</option>
  </select>
  <br><br>
  <label for="comment">Comment:</label require><br>
  <textarea id="comment" name="comment" rows="4" cols="50"></textarea>
  <br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>

