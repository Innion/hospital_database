<html>

<head>
  <title>Pacienti</title>
  <style>
    .table-excel {
      font-family: Arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    .table-excel td,
    .table-excel th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    .table-excel tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table-excel th {
      padding-top: 12px;
      padding-bottom: 12px;
      background-color: #4CAF50;
      color: white;
    }

    /* Centered title style */
    .table-excel .title {
      text-align: center;
      font-size: 24px;
      background-color: #ffffff;
      color: black;
    }
  </style>
</head>

<body>

  <?php
  $user = 'root';
  $password = '';
  $database = 'ETTI_HOSPITAL';
  $port = NULL;
  $conn = new mysqli('127.0.0.1', $user, $password, $database, $port);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql1 = "SELECT * FROM tblPacienti";
  $result = $conn->query($sql1);
  if ($result->num_rows > 0) {
    echo "<table class =\"table-excel\"><tr><th class=\"title\"colspan =\"6\">Pacienti</th></tr><tr><th>Nume</th><th>Prenume</th><th>MediuDeProvenienta</th><th>Adresa</th><th>CNP</th><th>Actions</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["Nume"] . "</td><td>" . $row["Prenume"] . "</td><td>" . $row["MediuDeProvenienta"] . "</td><td>" . $row["Adresa"] . "</td><td>" . $row["CNP"] . "</td>";
      echo "<td><a href='edit_pac.php?CNP=" . $row['CNP'] . "'>Edit</a> | <a href='delete_pac.php?CNP=" . $row['CNP'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
  $conn->close();

  ?>
  <button onclick="location.href='add_pac.html'">➕</button>

</body>

</html>