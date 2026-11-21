<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>

<h2>Student Details</h2>

<?php

$conn = mysqli_connect("localhost", "root", "", "school_db");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

if ($result) {

    echo "<table border='1' cellpadding='10'>";

    echo "<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";

        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['course']) . "</td>";

        echo "</tr>";
    }

    echo "</table>";
}

mysqli_close($conn);

?>

</body>
</html>