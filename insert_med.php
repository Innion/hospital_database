<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>ETTI Hospital</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <section class="cta cta-inner succes">
        <?php
        // Database connection
        $user = 'root';
        $password = '';
        $database = 'ETTI_HOSPITAL';
        $port = NULL;
        $conn = new mysqli('127.0.0.1', $user, $password, $database, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve form data
        $id = $_POST['IdMedic'];
        $nume = $_POST['Nume'];
        $prenume = $_POST['Prenume'];
        $specializare = $_POST['Specializare'];
        $grad = $_POST['Grad'];
        $sectie = $_POST['Sectie'];
        $cnp = $_POST['CNP'];

        // Insert new patient into database
        $sql = "INSERT INTO tblMedici (IdMedic, Nume, Prenume, Specializare, Grad, Sectie, CNP) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $id, $nume, $prenume, $specializare, $grad, $sectie, $cnp);

        if ($stmt->execute()) {
            echo "Medicul a fost adăugat cu succes";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close database connection
        $conn->close();
        ?>

        <button onclick="location.href='medici.php'">⬅</button>

    </section>
</body>

</html>