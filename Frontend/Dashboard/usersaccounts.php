<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "qcpl";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);

if ($result_users->num_rows > 0) {
    echo "<h2>USERS</h2>";
    echo "<table aria-describedby='user-table'>";
    echo "<tr><th>ID</th><th>Name</th><th>Division</th><th>Username</th><th>Password</th><th colspan='2'>Action</th></tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $result_users->fetch_assoc()) {
        echo "<tr>";
        echo "<td><center>" .  htmlspecialchars($row["id"]) . "</td>";
        echo "<td><center>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td><center>" . htmlspecialchars($row["division"]) . "</td>";
        echo "<td><center>" . htmlspecialchars($row["username"]) . "</td>";
        echo "<td><center>" . str_repeat("*", strlen($row["password"])) . "</td>";
        echo "<td><center><a href='updateuseradmin.php?id=" . htmlspecialchars($row["id"]) . "'>Edit</a></td>";
        echo "<td><center><a href='deleteuseradmin.php?id=" . htmlspecialchars($row["id"]) . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No admins found.</p>";
}
$conn->close();
?>