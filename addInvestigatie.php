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
                    <li class="nav-item  px-lg-4">
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
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="echipa_medici.html">Echipa de medici</a>
                    </li>
                    <!-- <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="efecte.html">Efecte</a>
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

    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner content-normal text-right rounded">
                        <h2 class="section-heading mb-12">
                            <span class="section-heading-lower"><b>Adaugă o investigație</b></span><br>
                        </h2>
                        <form action="insert_inv.php" method="post">
                            <fieldset>
                                <label for="IdInvestigatie">ID: <input type="text" name="IdInvestigatie" placeholder="01234" required></label><br>
                                <label for="NumeInvestigatie">Nume investigație: <input type="text" name="NumeInvestigatie" placeholder="Inv01" required></label><br>
                                <label for="Rezultate">Rezultate: <input type="text" name="Rezultate" placeholder="Stres" required></label><br>
                                <label for="Fisa">Fișă: <input id="Fisa" name="Fisa" type="text" placeholder="123" required /></label><br>
                            </fieldset>

                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>