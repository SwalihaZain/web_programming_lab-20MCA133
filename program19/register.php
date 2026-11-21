<?php
include "db.php";
if ($_POST) {
  $p = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  $conn->query("INSERT INTO users(name,email,password) VALUES('{$_POST['name']}','{$_POST['email']}','$p')");
  echo "Registered! <a href='login.php'>Login</a>";
}
?>
<form method="POST">
  Name: <input name="name" required><br>
  Email: <input type="email" name="email" required><br>
  Password: <input type="password" name="pass" required><br>
  <button>Register</button>
</form>