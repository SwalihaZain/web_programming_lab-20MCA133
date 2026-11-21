<!DOCTYPE html>
<html>
<head>
    <title>Indian Cricket Players</title>
</head>

<body>

<h2>List of Indian Cricket Players</h2>

<?php

$players = [
    "Virat Kohli",
    "Rohit Sharma",
    "Jasprit Bumrah",
    "MS Dhoni",
    "Sachin Tendulkar",
    "Ravindra Jadeja",
    "KL Rahul",
    "Hardik Pandya",
    "Ravichandran Ashwin",
    "Shubman Gill"
];

echo "<table border='1'>";

echo "<tr>
        <th>Sr. No</th>
        <th>Player Name</th>
      </tr>";

$srNo = 1;

foreach ($players as $player) {

    echo "<tr>
            <td>$srNo</td>
            <td>$player</td>
          </tr>";

    $srNo++;
}

echo "</table>";

?>

</body>
</html>