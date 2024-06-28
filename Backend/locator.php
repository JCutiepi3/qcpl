<?php
if(isset($_GET['find'])) {
    $locator = $_GET['locator'];

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "qcpl";

    $conn = new mysqli($server, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM fileupload WHERE locator_num = '$locator'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .document-info {
            background-color: #e0e9f0; /* Light blue shade */
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .document-info h2 {
            color: #003366; /* Dark blue text */
            font-size: 24px;
            margin-bottom: 10px;
        }
        .document-info p {
            margin: 5px 0;
            color: #333; /* Dark text color */
        }
        .document-info a {
            color: #0066cc; /* Blue link color */
            text-decoration: none;
        }
        .document-info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="document-info">
        <h2>Document Details</h2>
        <p><strong>Locator Number:</strong> <?php echo $row["locator_num"]; ?></p>
        <p><strong>Subject:</strong> <?php echo $row["subject"]; ?></p>
        <p><strong>Description:</strong> <?php echo $row["description"]; ?></p>
        <p><strong>Category:</strong> <?php echo $row["category"]; ?></p>
        <p><strong>Division:</strong> <?php echo $row["division"]; ?></p>
        <p><strong>Section:</strong> <?php echo $row["section"]; ?></p>
        <p><strong>Proof Reader Comment:</strong> <?php echo $row["proofreader_comment"]; ?></p>
        <p><strong>Boss 2 Comment:</strong> <?php echo $row["boss2_comment"]; ?></p>
        <p><strong>Boss 1 Comment:</strong> <?php echo $row["boss1_comment"]; ?></p>
        <p><strong>Received From:</strong> <?php echo $row["received_from"]; ?></p>
        <p><strong>Received Date:</strong> <?php echo $row["received_date"]; ?></p>
        <p><strong>File:</strong> <a href="/qcpl/Backend/<?php echo $row["file_path"]; ?>" target="_blank">View File</a></p>
        <p><strong>Status:</strong> <?php echo $row["status"]; ?></p>
    </div>
</body>
</html>
<?php
        } // end while
    } else {
        echo "<script>alert('No document found!'); window.location='/qcpl/Frontend/Dashboard/dash.php';</script>";
    }
    $conn->close();
}
?>
