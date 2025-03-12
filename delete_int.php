<?php
$user = 'root';
$password = '';
$database = 'ETTI_HOSPITAL';
$port = NULL;
$conn = new mysqli('127.0.0.1', $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['Numar'])) {
    $Numar = $_GET['Numar'];

    // Delete record
    $query = "DELETE FROM tblInternari WHERE Numar='$Numar'";
    mysqli_query($conn, $query);

    header("Location: page_int.php");
} else {
    echo "Nu ai ales Internarea";
}
