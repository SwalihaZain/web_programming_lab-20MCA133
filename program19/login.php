<?php
session_start(); include "db.php";
if ($_POST) {
  $u = $conn->query("SELECT * FROM users WHERE email='{$_POST['email']}'")->fetch_assoc();
  if ($u && password_verify($_POST['pass'], $u['password'])) {
    $_SESSION['uid'] = $u['id'];
    $_SESSION['uname'] = $u['name'];
    header("Location: flight.php"); exit;
  }
  echo "Invalid login";
}
?>
<form method="POST">
  Email: <input type="email" name="email" required><br>
  Password: <input type="password" name="pass" required><br>
  <button>Login</button>
</form>