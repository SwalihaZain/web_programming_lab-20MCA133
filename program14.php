<!DOCTYPE html>
<html>
<head>
    <title>Student Array Sorting</title>
</head>
<body>

<h2>Student Names</h2>

<?php

$students = array("Anu", "Rahul", "Swaliha", "Amina", "John");

echo "<h3>Original Array</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

asort($students);

echo "<h3>Ascending Order</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

arsort($students);

echo "<h3>Descending Order</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

?>

</body>
</html>