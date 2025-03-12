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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if form fields are set and not empty
            if (
                isset($_POST['CNP']) && !empty($_POST['CNP']) &&
                isset($_POST['nume']) && !empty($_POST['nume']) &&
                isset($_POST['prenume']) && !empty($_POST['prenume']) &&
                isset($_POST['mediuDeProvenienta']) && !empty($_POST['mediuDeProvenienta']) &&
                isset($_POST['adresa']) && !empty($_POST['adresa'])
            ) {

                // Sanitize input data
                $CNP = $_POST['CNP'];
                $nume = $_POST['nume'];
                $prenume = $_POST['prenume'];
                $mediuDeProvenienta = $_POST['mediuDeProvenienta'];
                $adresa = $_POST['adresa'];

                // Update patient data in the database
                $sql = "UPDATE tblPacienti SET Nume='$nume', Prenume='$prenume', MediuDeProvenienta='$mediuDeProvenienta', Adresa='$adresa' WHERE CNP='$CNP'";

                if ($conn->query($sql) === TRUE) {
                    echo "Datele pacientului au fost actualizate cu succes.";
                } else {
                    echo "Eroare la actualizarea datelor: " . $conn->error;
                }
            } else {
                echo "Toate campurile sunt obligatorii.";
            }
        }

        $conn->close();

        ?>
        <button onclick="location.href='pacienti.php'">⬅</button>
    </section>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>