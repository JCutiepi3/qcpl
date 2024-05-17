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
                <select name="subdivision" id="subdivision" required>
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
                            subdivisionSelect.add(new Option("Option Admin 1 (Administrative Services)", "optionAdmin1"));
                            subdivisionSelect.add(new Option("Option Admin 2 (Administrative Services)", "optionAdmin2"));
                            subdivisionSelect.add(new Option("Option Admin 3 (Administrative Services)", "optionAdmin3"));
                            break;
                        case "district":
                            subdivisionSelect.add(new Option("Branch Libraries", "optionD1"));
                        
                        default:
                            break;
                    }
                }
            </script>
  <br>
  <label for="comment">Comment:</label require><br>
  <textarea id="comment" name="comment" rows="4" cols="50"></textarea>
  <br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>

