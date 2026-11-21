<?php
$conn = mysqli_connect("localhost", "root", "", "airline_db");
$res = $conn ? mysqli_query($conn, "SELECT COUNT(*) AS total FROM flights") : false;
$row = $res ? mysqli_fetch_assoc($res) : null;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Program 20 - Application Server Test</title>
</head>
<body>
  <h2>Application Server Test</h2>
  <p><b>Server:</b> <?= $_SERVER['SERVER_SOFTWARE'] ?></p>
  <p><b>PHP Version:</b> <?= phpversion() ?></p>
  <p><b>Host:</b> <?= $_SERVER['SERVER_NAME'] ?></p>
  <p><b>Database (airline_db):</b> <?= $conn ? "Connected" : "Failed" ?></p>
  <?php if ($row): ?>
    <p><b>Flights in DB:</b> <?= $row['total'] ?></p>
  <?php endif; ?>
</body>
</html>