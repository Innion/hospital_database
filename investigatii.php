<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>ETTI Hospital</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
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
            <a class="nav-link text-uppercase text-expanded" href="index.html">Prima pagină
            </a>
          </li>
          <li class="nav-item px-lg-4 dropdown">
            <a class="nav-link text-uppercase text-expanded" href="#">Detalii</a>
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
          <li class="nav-item  px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="echipa_medici.html">Echipa de medici</a>
          </li>
          <!-- <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="efecte.html">Efecte</a>
            </li> -->

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


  <!-- Partea de HTML -->
  <section class="options">
    <form method="post" action="">
      <label for="order_rule">Order By:</label>
      <select name="order_rule" id="order_rule">
        <option value="1">Nume</option>
        <option value="2">Prenume</option>
        <option value="3">CNP</option>
        <option value="4">Rezultat</option>
        <option value="5">NumeInvestigatie</option>
        <!-- Add more options as needed -->
      </select>
      <select name="order_dir" id="order_dir">
        <option value="1">Ascending</option>
        <option value="2">Descending</option>
      </select>
      <input type="submit" name="order_submit" value="Order">
    </form>

    <form method="post" action="">
      <select name="search_column" id="search_column">
        <option value="Nume">Nume</option>
        <option value="Prenume">Prenume</option>
        <option value="CNP">CNP</option>
        <option value="Rezultat">Rezultat</option>
        <option value="NumeInvestigatie">NumeInvestigatie</option>
      </select>
      <input type="text" name="search_term" placeholder="Search...">
      <input type="submit" name="search_submit" value="Search">
    </form>
    <!-- Partea de HTML -->
  </section>

  <div id="table-container">

    <!-- Partea de php -->
    <?php
    $user = 'root';
    $password = '';
    $database = 'ETTI_HOSPITAL';
    $port = NULL;
    $conn = new mysqli('127.0.0.1', $user, $password, $database, $port);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql1 = '';

    // Check which form was submitted
    if (isset($_POST['order_submit'])) {
      // Order form submitted
      // Handle ordering logic here
      $order_rule = isset($_POST['order_rule']) ? $_POST['order_rule'] : 'default_rule';
      $order_dir = isset($_POST['order_dir']) ? $_POST['order_dir'] : 'default_dir';

      switch ($order_dir) {
        case '1':
          switch ($order_rule) {
            case '1':
              $order_by = "ORDER BY Nume ASC";
              break;
            case '2':
              $order_by = "ORDER BY Prenume ASC";
              break;
            case '3':
              $order_by = "ORDER BY CNP ASC";
              break;
            case '4':
              $order_by = "ORDER BY Rezultat ASC";
              break;
            case '5':
              $order_by = "ORDER BY NumeInvestigatie ASC";
              break;
            default:
              $order_by = ""; // Default order
          }
          break;
        case '2':
          switch ($order_rule) {
            case '1':
              $order_by = "ORDER BY Nume DESC";
              break;
            case '2':
              $order_by = "ORDER BY Prenume DESC";
              break;
            case '3':
              $order_by = "ORDER BY CNP DESC";
              break;
            case '4':
              $order_by = "ORDER BY Rezultat DESC";
              break;
            case '5':
              $order_by = "ORDER BY NumeInvestigatie DESC";
              break;
            default:
              $order_by = ""; // Default order
          }
          break;
        default:
          switch ($order_rule) {
            case '1':
              $order_by = "ORDER BY Nume DESC";
              break;
            case '2':
              $order_by = "ORDER BY Prenume DESC";
              break;
            case '3':
              $order_by = "ORDER BY CNP DESC";
              break;
            case '4':
              $order_by = "ORDER BY Rezultat DESC";
              break;
            case '5':
              $order_by = "ORDER BY NumeInvestigatie DESC";
              break;
            default:
              $order_by = ""; // Default order
          }
          break;
      }

      // Modify the SQL query based on the selected sorting rule
      $sql1 = "SELECT 
    p.Nume AS Nume,
    p.Prenume AS Prenume,
    p.CNP,
    i.Rezultate AS Rezultat,
    i.NumeInvestigatie AS NumeInvestigatie
  FROM 
    tblPacienti p
  JOIN 
    tblFiseMedicale fm ON p.IdPacient = fm.Pacient
  JOIN 
    tblInvestigatii i ON fm.IdFisa = i.Fisa
  $order_by"; // Append the ORDER BY clause to the SQL query
    } elseif (isset($_POST['search_submit'])) {
      // Search form submitted
      // Handle searching logic here
      $search_column = isset($_POST['search_column']) ? $_POST['search_column'] : 'Nume';
      $search_term = isset($_POST['search_term']) ? $_POST['search_term'] : '';

      // Modify the SQL query based on the selected search column and term
      $sql1 = "SELECT 
    p.Nume AS Nume,
    p.Prenume AS Prenume,
    p.CNP,
    i.Rezultate AS Rezultat,
    i.NumeInvestigatie AS NumeInvestigatie
  FROM 
    tblPacienti p
  JOIN 
    tblFiseMedicale fm ON p.IdPacient = fm.Pacient
  JOIN 
    tblInvestigatii i ON fm.IdFisa = i.Fisa
  WHERE
    $search_column LIKE '%$search_term%'
    
  "; // Add order by clause if needed
    } else {
      // Search form submitted
      // Handle searching logic here
      $search_column = isset($_POST['search_column']) ? $_POST['search_column'] : 'Nume';
      $search_term = isset($_POST['search_term']) ? $_POST['search_term'] : '';

      // Modify the SQL query based on the selected search column and term
      $sql1 = "SELECT 
    p.Nume AS Nume,
    p.Prenume AS Prenume,
    p.CNP,
    i.Rezultate AS Rezultat,
    i.NumeInvestigatie AS NumeInvestigatie
  FROM 
    tblPacienti p
  JOIN 
    tblFiseMedicale fm ON p.IdPacient = fm.Pacient
  JOIN 
    tblInvestigatii i ON fm.IdFisa = i.Fisa
  ";
    }


    echo "<br />";
    echo "<br />";

    $result = $conn->query($sql1);
    if ($result->num_rows > 0) {
      echo "<table class=\"table-excel\">";
      echo "<tr><th class=\"title\" colspan=\"6\">Investigații</th></tr>";
      echo "<tr><th>Nume</th><th>Prenume</th><th>CNP</th><th>Rezultat</th><th>NumeInvestigatie</th>";

      // Butonul este plasat într-o celulă a tabelului
      echo "<th><button onclick=\"location.href='addInvestigatie.php'\">➕Investigație</button></th>";

      echo "</tr>";

      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Nume"] . "</td><td>" . $row["Prenume"] . "</td><td>" . $row["CNP"] . "</td><td>" . $row["Rezultat"] . "</td><td>" . $row["NumeInvestigatie"] . "<td><a href='delete_inv_pac_filter.php?NumeInvestigatie=" . $row['NumeInvestigatie'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
    $conn->close();

    echo "<br />";
    echo "<br />";
    ?>

    <!-- Sfarsit parte php -->

  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>