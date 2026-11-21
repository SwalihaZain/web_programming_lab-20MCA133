<?php session_start(); ?>
<h2>Airline Reservation</h2>
<?php if (isset($_SESSION['uid'])): ?>
  <a href="flight.php">Flights</a> |
  <a href="book.php">Book</a> |
  <a href="logout.php">Logout</a>
<?php else: ?>
  <a href="register.php">Register</a> |
  <a href="login.php">Login</a>
<?php endif; ?>