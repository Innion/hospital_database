<?php
$user = 'root';
$password = '';
$database = 'ETTI_HOSPITAL'; 
$port = NULL; 
$conn = new mysqli('127.0.0.1', $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

if(isset($_GET['CNP'])) {
    $CNP = $_GET['CNP'];

    // Delete record
    $query = "DELETE FROM tblPacienti WHERE CNP='$CNP'";
    mysqli_query($conn, $query);

    header("Location: pacienti.php");
} else {
    echo "Nu ai ales CNP";
}
?>
