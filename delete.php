<?php

$id = $_GET['id'];
$dbname = "";
$conn = mysqli_connect("HOST", "USER", "PASS", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM news WHERE id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: news.php'); 
    exit;
} else {
    echo "Error deleting record";
}

?>
