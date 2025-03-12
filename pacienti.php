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

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-lower">ETTI Hospital</span>
  </h1>

  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <!-- <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="index.html">Prima pagină</a>
          </li>
          <li class="nav-item px-lg-4 dropdown">
            <a class="nav-link text-uppercase text-expanded" href="#">Tabele</a>
            <div class="dropdown-content">
              <ul>
                <li><a class="nav-link text-uppercase text-expanded" href="medici.php">Medici</a></li>
                <li><a class="nav-link text-uppercase text-expanded" href="pacienti.php">Pacienți</a></li>
                <li><a class="nav-link text-uppercase text-expanded" href="investigatii.php">Investigații</a></li>
                <li><a class="nav-link text-uppercase text-expanded" href="medical_file.php">Fișe medicale</a></li>
                <li><a class="nav-link text-uppercase text-expanded" href="internari.php">Internări</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="echipa_medici.html">Echipa de medici
              <span class="sr-only">(current)</span></a>
          </li>

          <!-- <li class="nav-item px-lg-4">
        <a class="nav-link text-uppercase text-expanded" href="page.php">Tabel</a>
      </li> -->

          <li class="nav-item px-lg-4 dropdown">
            <a class="nav-link text-uppercase text-expanded" href="#">Formulare</a>
            <div class="dropdown-content">
              <ul>
                <li><a class="nav-link text-uppercase text-expanded" href="addMedic.php">Adaugă medici</a></li>
                <li><a class="nav-link text-uppercase text-expanded" href="addPacient.php">Adaugă pacienți</a></li>
                <li><a class="nav-link text-uppercase text-expanded" href="addInvestigatie.php">Adaugă investigații</a></li>
                <li><a class="nav-link text-uppercase text-expanded" href="addMF.php">Adaugă fișe medicale</a></li>
                <li><a class="nav-link text-uppercase text-expanded" href="addInternare.php">Adaugă internări</a></li>
          </li>
      </div>

      <li class="nav-item px-lg-4">
        <a class="nav-link text-uppercase text-expanded" href="contact.html">Contact</a>
      </li>
      </ul>
    </div>
    </div>
  </nav>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <?php
  $user = 'root';
  $password = '';
  $database = 'ETTI_HOSPITAL';
  $port = NULL;
  $conn = new mysqli('127.0.0.1', $user, $password, $database, $port);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }



  // $sql = "SELECT Nume, Prenume, Specializare FROM tblmedici";
  // $result = $conn->query($sql);

  // if ($result->num_rows > 0) {
  //   // class = \"cta\" class = \"cta-innerclass\"

  //   echo "<br />";
  //   echo "<br />";

  //     echo "<table  class=\"table-excel\"><tr><th class=\"title\"colspan =\"4\">MEDICI</th></tr><tr><th>Nume</th><th>Prenume</th><th>Specializare</th></tr>";
  //   // output data of each row
  //   while ($row = $result->fetch_assoc()) {

  //     echo "<tr><td>" . $row["Nume"] . "</td><td>" . $row["Prenume"] . "</td><td>" . $row["Specializare"] . "</td></tr>";
  //   }
  //   echo "</table>";
  // } else {
  //   echo "0 results";
  // }



  echo "<br />";
  echo "<br />";

  $sql1 = "SELECT Nume, Prenume, CNP FROM tblPacienti";
  $result = $conn->query($sql1);
  if ($result->num_rows > 0) {
    // echo "<table class =\"table-excel\"><tr><th class=\"title\"colspan =\"4\">PACIENȚI</th></tr><tr><th>Nume</th><th>Prenume</th><th>CNP</th></tr>";
    // echo "<button onclick=\"location.href='addPacient.php'\">➕</button>";
    // echo "</th></tr>";

    echo "<table class=\"table-excel\">";
    echo "<tr><th class=\"title\" colspan=\"4\">PACIENȚI</th></tr>";
    echo "<tr><th>Nume</th><th>Prenume</th><th>CNP</th><th>";

    // Butonul este plasat într-o celulă a tabelului
    echo "<button onclick=\"location.href='addPacient.php'\">➕Pacient</button>";

    echo "</th></tr>";

    // output data of each row
    while ($row = $result->fetch_assoc()) {

      echo "<tr><td>" . $row["Nume"] . "</td><td>" . $row["Prenume"] . "</td><td>" . $row["CNP"] . "<td><a href='edit_pac.php?CNP=" . $row['CNP'] . "'>Edit</a> |<a href='delete.php?CNP=" . $row['CNP'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
  $conn->close();

  echo "<br />";
  echo "<br />";

  ?>

</html>