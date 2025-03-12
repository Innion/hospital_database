<?php
$user = 'root';
$password = '';
$database = 'ETTI_HOSPITAL';
$port = NULL;
$conn = new mysqli('127.0.0.1', $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['IdFisa'])) {
    $IdFisa = $_GET['IdFisa'];

    // Delete record
    $query = "DELETE FROM tblFiseMedicale WHERE IdFisa='$IdFisa'";
    mysqli_query($conn, $query);

    header("Location: medical_file.php");
} else {
    echo "Nu ai ales o Fisa Medicala existenta";
}
