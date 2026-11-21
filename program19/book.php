<?php
session_start(); include "db.php";
if (!isset($_SESSION['uid'])) { header("Location: login.php"); exit; }

if (isset($_POST['book'])) {
  $fid = (int)$_POST['fid']; $s = (int)$_POST['seats'];
  $f = $conn->query("SELECT * FROM flights WHERE id=$fid")->fetch_assoc();
  if ($f && $s > 0 && $s <= $f['seats']) {
    $tot = $s * $f['fare'];
    $conn->query("INSERT INTO bookings(user_id,flight_id,passenger_name,email,seats_booked,total_fare) VALUES({$_SESSION['uid']},$fid,'{$_POST['name']}','{$_POST['email']}',$s,$tot)");
    $conn->query("UPDATE flights SET seats=seats-$s WHERE id=$fid");
    echo "Booked! Total: ₹$tot<br>";
  } else echo "No seats<br>";
}
$fl = $conn->query("SELECT * FROM flights");
$bk = $conn->query("SELECT * FROM bookings WHERE user_id={$_SESSION['uid']}");
?>
<a href="flight.php">Flights</a> | <a href="logout.php">Logout</a>
<form method="POST">
  Flight: <select name="fid"><?php while ($f = $fl->fetch_assoc()): ?>
    <option value="<?= $f['id'] ?>"><?= $f['flight_no'] ?> (<?= $f['source'] ?>-<?= $f['destination'] ?>) ₹<?= $f['fare'] ?></option>
  <?php endwhile; ?></select><br>
  Name: <input name="name" value="<?= $_SESSION['uname'] ?>" required><br>
  Email: <input type="email" name="email" required><br>
  Seats: <input type="number" name="seats" min="1" value="1" required><br>
  <button name="book">Book</button>
</form>
<h3>Bookings</h3>
<table border="1" cellpadding="5">
  <tr><th>ID</th><th>Passenger</th><th>Seats</th><th>Total</th></tr>
  <?php while ($b = $bk->fetch_assoc()): ?>
  <tr><td><?= $b['id'] ?></td><td><?= $b['passenger_name'] ?></td><td><?= $b['seats_booked'] ?></td><td><?= $b['total_fare'] ?></td></tr>
  <?php endwhile; ?>
</table>