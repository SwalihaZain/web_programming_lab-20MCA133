<!DOCTYPE html>
<html>
<head>
    <title>Job Application</title>
</head>
<body>

<h2>Online Job Application Form</h2>

<form method="POST">

    Name:
    <input type="text" name="name" required>
    <br><br>

    Email:
    <input type="email" name="email" required>
    <br><br>

    Phone:
    <input type="text" name="phone" required>
    <br><br>

    Qualification:
    <input type="text" name="qualification" required>
    <br><br>

    Position:
    <select name="position" required>
        <option value="">Select Position</option>
        <option value="Developer">Developer</option>
        <option value="Tester">Tester</option>
        <option value="Designer">Designer</option>
    </select>
    <br><br>

    <input type="submit" name="submit"
           value="Apply Now">

</form>

<?php

if (isset($_POST['submit'])) {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $qualification = htmlspecialchars($_POST['qualification']);
    $position = htmlspecialchars($_POST['position']);

    echo "<h2>Application Details</h2>";

    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Phone: $phone <br>";
    echo "Qualification: $qualification <br>";
    echo "Position: $position <br>";

    echo "<h3>Application Submitted Successfully!</h3>";
}

?>

</body>
</html>