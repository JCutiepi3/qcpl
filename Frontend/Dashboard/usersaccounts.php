<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_admins = "SELECT * FROM admins";
$result_admins = $conn->query($sql_admins);

if ($result_admins->num_rows > 0) {
    echo "<h2>ADMINS</h2>";
    echo "<table aria-describedby='admin-table'>";
    echo "<tr><th>ID</th><th>Name</th><th>Division</th><th>Username</th><th>Password</th><th colspan='2'>Action</th></tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $result_admins->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . "<center>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["division"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
        echo "<td>" . str_repeat("*", strlen($row["password"])) . "</td>";
        echo "<td><a href='updateuseradmin.php?id=" . htmlspecialchars($row["id"]) . "'>Edit</a></td>";
        echo "<td><a href='deleteuseradmin.php?id=" . htmlspecialchars($row["id"]) . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No admins found.</p>";
}
$conn->close();
?>