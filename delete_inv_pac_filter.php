<?php
$user = 'root';
$password = '';
$database = 'ETTI_HOSPITAL';
$port = NULL;
$conn = new mysqli('127.0.0.1', $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['NumeInvestigatie'])) {
    $NumeInvestigatie = $_GET['NumeInvestigatie'];

    // Delete record
    $query = "DELETE FROM tblInvestigatii WHERE NumeInvestigatie='$NumeInvestigatie'";
    mysqli_query($conn, $query);

    header("Location: investigatii.php");
} else {
    echo "Nu ai ales Investigatia";
}
