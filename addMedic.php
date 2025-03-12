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
                            <span class="section-heading-lower"><b>Adaugă un medic</b></span><br>
                        </h2>
                        <form action="insert_med.php" method="post">
                            <fieldset>
                                <label for="IdMedic">ID: <input type="text" name="IdMedic" placeholder="01234" required></label><br>
                                <label for="lastName">Nume: <input type="text" name="Nume" placeholder="Popescu" required></label><br>
                                <label for="firstName">Prenume: <input type="text" name="Prenume" placeholder="Ion" required></label><br>
                                <label for="CNP">CNP: <input id="cnp" name="CNP" type="text" pattern="[0-9]{13,}" placeholder="2901010032632" required /></label><br>
                                <label for="adresa">Introduceți adresa: <input type="text" name="Adresa" placeholder="str., bl., sc., ap., jud." required></label><br>
                            </fieldset>
                            <fieldset>
                                <label for="specializare">Alegeți specializarea: <select id="Specializare" name="Specializare" required>
                                        <option value="">(selectează una)</option>
                                        <option value="Boli infecțioase">Boli infecțioase</option>
                                        <option value="Cardiologie">Cardiologie</option>
                                        <option value="Chirurgie">Chirurgie</option>
                                        <option value="Dermatologie">Dermatologie</option>
                                        <option value="Ginecologie">Ginecologie</option>
                                        <option value="Pediatrie">Pediatrie</option>
                                        <option value="Psihiatrie">Psihiatrie</option>
                                        <option value="Oftalmologie">Oftalmologie</option>
                                        <option value="Ortopedie">Ortopedie</option>
                                        <option value="Stomatologie">Stomatologie</option>
                                    </select>
                                </label>
                            </fieldset>

                            <fieldset>
                                <label for="grad">Alegeți gradul: <select id="Grad" name="Grad" required>
                                        <option value="">(selectează una)</option>
                                        <option value="rezident">Rezident</option>
                                        <option value="specialist">Specialist</option>
                                        <option value="primar">Primar</option>
                                        <option value="generalist">Generalist</option>
                                    </select>
                                </label>
                            </fieldset>

                            <fieldset>
                                <label for="sectie">Introduceți secția: <input type="text" name="Sectie" placeholder="02" required></label><br>
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