<?php

session_start();


require_once "../classes/data.class.php";


if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>oefen examen</title>
</head>
<body>
    <!------------------------ NAVBAR BEGIN  --------------------------->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Excellent Taste</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reserveringen.php">Reserveringen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="klanten.php">Klanten</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bestellingen.php">Bestellingen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tafel.php">Tafels</a>
      </li>
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown">Gerechten</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="gerechtcategorien.php">Gerechtcategorien</a>
                <a class="dropdown-item" href="gerechtsoort.php">Gerechtsoorten</a>
                <a class="dropdown-item" href="menu_items.php">Menu-items</a>
            </div>
      </li>
    </ul>
  </div>
</nav>
<!----------------------------- NAVBAR END ------------------------->
<!----------------------------- RESERVERINGEN TABLE  BEGIN ------------------------->
<a href="add_reservering.php"><button type="button" class="btn btn-primary" style="margin: 10px">Toevoegen</button></a>
<h3>sorteer op:</h3>
<a href="?sort=Tijd"><button type="button" class="btn btn-secondary" style="margin: 10px">tijd</button></a>
<a href="?sort=Datum"><button type="button" class="btn btn-succes" style="margin: 10px">datum</button></a>
<table>
    <thead>
        <tr>
            <td><h3>Tafel</h3></td>
            <td><h3>Datum</h3></td>
            <td><h3>Tijd</h3></td>
            <td><h3>Aantal</h3></td>
            <td><h3>Status</h3></td>
            <td><h3>Aantal Kinderen</h3></td>
            <td><h3>Allergieen</h3></td>
            <td><h3>Opmerkingen</h3></td>
        </tr>
    </thead>
    <tbody>
            <?php
            $series = new Data();
            $series -> getReserveringen();
            ?>
    </tbody>
</table>
<!----------------------------- RESERVERINGEN TABLE END ------------------------->

    
</body>
</html>