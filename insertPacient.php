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
    $user = 'root';
    $password = '';
    $database = 'ETTI_HOSPITAL';
    $port = NULL;
    $conn = new mysqli('127.0.0.1', $user, $password, $database, $port);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO tblPacienti VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $IdPacient, $Nume, $Prenume, $CNP, $MediuDeProvenienta, $Adresa);

    $IdPacient = $_POST['IdPacient'];
    $Nume = $_POST['Nume'];
    $Prenume = $_POST['Prenume'];
    $CNP = $_POST['CNP'];

    if (isset($_POST['mediu'])) {
      $MediuDeProvenienta = $_POST['mediu'];
      // Process the selected value (e.g., save to database, perform an action, etc.)
    }


    $Adresa = $_POST['Adresa'];

    $stmt->execute();
    echo "Pacientul a fost adăugat cu succes!";
    /* (95, 'Halep','Adriana','2790713321695', 'Urban', 'Strada Florilor nr. 23, Bucuresti, sector 3'); */
    $stmt->close();
    $conn->close();
    ?>
    <button onclick="location.href='pacienti.php'">⬅</button>

  </section>
</body>

</html>