<!DOCTYPE html>
<html>
<head>
    <title>Book Management System</title>
</head>
<body>

<h2>Enter Book Information</h2>

<form method="POST">

    Accession Number:
    <input type="number" name="accession" required>
    <br><br>

    Title:
    <input type="text" name="title" required>
    <br><br>

    Authors:
    <input type="text" name="authors" required>
    <br><br>

    Edition:
    <input type="text" name="edition" required>
    <br><br>

    Publisher:
    <input type="text" name="publisher" required>
    <br><br>

    <input type="submit" name="add" value="Add Book">

</form>

<hr>

<h2>Search Book</h2>

<form method="POST">

    Enter Book Title:
    <input type="text" name="search_title" required>

    <input type="submit" name="search" value="Search">

</form>

<?php

$conn = mysqli_connect("localhost", "root", "", "library_db");

if (!$conn) {
    die("Database Connection Failed");
}

// Insert book details

if (isset($_POST['add'])) {

    $accession = $_POST['accession'];
    $title = $_POST['title'];
    $authors = $_POST['authors'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];

    $stmt = mysqli_prepare($conn,
        "INSERT INTO books VALUES (?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param(
        $stmt,
        "issss",
        $accession,
        $title,
        $authors,
        $edition,
        $publisher
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<h3>Book Added Successfully!</h3>";
    } else {
        echo "<h3>Book Insertion Failed!</h3>";
    }

    mysqli_stmt_close($stmt);
}

// Search book by title

if (isset($_POST['search'])) {

    $search = $_POST['search_title'];

    $stmt = mysqli_prepare($conn,
        "SELECT * FROM books WHERE title LIKE ?");

    $pattern = "%" . $search . "%";

    mysqli_stmt_bind_param($stmt, "s", $pattern);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    echo "<h3>Book Search Results</h3>";

    if (mysqli_num_rows($result) > 0) {

        echo "<table border='1' cellpadding='10'>";

        echo "<tr>
        <th>Accession Number</th>
        <th>Title</th>
        <th>Authors</th>
        <th>Edition</th>
        <th>Publisher</th>
        </tr>";

        while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr>";

            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }

            echo "</tr>";
        }

        echo "</table>";

    } else {

        echo "No Books Found";

    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>

</body>
</html>