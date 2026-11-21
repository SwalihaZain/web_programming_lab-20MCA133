<?php
session_start(); include "db.php";
if (!isset($_SESSION['uid'])) { header("Location: login.php"); exit; }

$sql = "SELECT * FROM flights";
if (isset($_POST['search'])) {
  $sql .= " WHERE source='{$_POST['src']}' AND destination='{$_POST['dst']}'";
}
$res = $conn->query($sql);
?>
<a href="flight.php">All</a> | <a href="book.php">Book</a> | <a href="logout.php">Logout</a>
<form method="POST">
  From: <input name="src"> To: <input name="dst">
  <button name="search">Search</button>
</form><br>
<table border="1" cellpadding="5">
  <tr><th>Flight</th><th>Route</th><th>Fare</th><th>Seats</th></tr>
  <?php while ($f = $res->fetch_assoc()): ?>
  <tr>
    <td><?= $f['flight_no'] ?></td>
    <td><?= $f['source'] ?>-<?= $f['destination'] ?></td>
    <td><?= $f['fare'] ?></td>
    <td><?= $f['seats'] ?></td>
  </tr>
  <?php endwhile; ?>
</table>