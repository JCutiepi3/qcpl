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
  </select><label>Division: </label>
            <select name="division" id="division" required onchange="updateSubdivision()">
                <option value="">Select Division</option>
                <option value="readers">Readers' Services Division</option>
                <option value="technical">Technical Division</option>
                <option value="library">Library Extension Division</option>
                <option value="publication">Publication Division</option>
                <option value="administrative">Administrative Services</option>
                <option value="district">District Libraries Division</option>
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
                        case "readers":
                            subdivisionSelect.add(new Option("Reference Section", "option1"));
                            subdivisionSelect.add(new Option("Filipiniana, Local History and Archives Section", "option2"));
                            subdivisionSelect.add(new Option("Law Research Section", "option3"));
                            subdivisionSelect.add(new Option("Periodical Section", "option4"));
                            subdivisionSelect.add(new Option("Children;s Section", "option5"));
                            subdivisionSelect.add(new Option("Management Information System Section", "option6"));
                            break;
                        case "technical":
                            subdivisionSelect.add(new Option("Collection Development", "optionA"));
                            subdivisionSelect.add(new Option("Cataloging Section", "optionB"));
                            subdivisionSelect.add(new Option("Binding and Preservation Section", "optionC"));
                            break;
                        case "library":
                            subdivisionSelect.add(new Option("Recreational", "optionX"));
                            subdivisionSelect.add(new Option("Outreach", "optionY"));
                            subdivisionSelect.add(new Option("Puppeteers", "optionZ"));
                            break;
                        case "publication":
                            subdivisionSelect.add(new Option("Publishing Section", "optionP"));
                            subdivisionSelect.add(new Option("Marketing Section", "optionQ"));
                            break;
                        case "administrative":
                        subdivisionSelect.add(new Option("No Section", "optionG"));
                            break;
                        case "district":
                            subdivisionSelect.add(new Option("Branch Libraries", "optionD1"));
                        
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

