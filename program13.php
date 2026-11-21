<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill</title>
</head>

<body>

<h2>Electricity Bill Calculation</h2>

<form action="" method="post">

    <input type="text" name="customerName"
           placeholder="Customer Name" required>
    <br><br>

    <input type="number" name="units"
           placeholder="Units Consumed"
           min="0" required>
    <br><br>

    <input type="number" name="rate"
           placeholder="Rate per unit (₹)"
           min="0" step="any" required>
    <br><br>

    <input type="number" name="additional_charges"
           placeholder="Additional Charges (₹)"
           min="0" step="any">
    <br><br>

    <input type="number" name="discount"
           placeholder="Discount (%)"
           min="0" max="100" step="any">
    <br><br>

    <button type="submit">Generate Bill</button>

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customerName = htmlspecialchars($_POST["customerName"]);

    $units = $_POST["units"];
    $rate = $_POST["rate"];

    $additional_charges = isset($_POST["additional_charges"])
        ? $_POST["additional_charges"] : 0;

    $discount = isset($_POST["discount"])
        ? $_POST["discount"] : 0;

    // Calculate base amount
    $base_amount = $units * $rate;

    // Calculate discount amount
    $discount_amount =
        ($base_amount + $additional_charges) * ($discount / 100);

    // Calculate total bill
    $total_bill =
        $base_amount + $additional_charges - $discount_amount;

    echo "<h3>Bill Details</h3>";

    echo "<table border='1' cellpadding='10'>";

    echo "<tr>";
    echo "<th>Customer Name</th>";
    echo "<td>$customerName</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<th>Units Consumed</th>";
    echo "<td>$units</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<th>Rate per Unit</th>";
    echo "<td>₹" . number_format($rate, 2) . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<th>Base Amount</th>";
    echo "<td>₹" . number_format($base_amount, 2) . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<th>Additional Charges</th>";
    echo "<td>₹" . number_format($additional_charges, 2) . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<th>Discount</th>";
    echo "<td>" . number_format($discount, 2) . "%</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<th>Total Bill</th>";
    echo "<td>₹" . number_format($total_bill, 2) . "</td>";
    echo "</tr>";

    echo "</table>";
}

?>

</body>
</html>