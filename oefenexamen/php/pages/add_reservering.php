<?php

require('../classes/dbh.class.php');
require('../classes/insert.class.php');

session_start();
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
<!----------------------------- ADD RESERVERING FORM BEGIN ------------------------->
<form method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Naam</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Naam" name="naam">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Telefoon</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Telefoon nummer" name="telefoon">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tafel</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Tafel" name="tafel">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Datum</label>
    <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Datum" name="datum">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tijd</label>
    <input type="time" class="form-control" id="exampleFormControlInput1" placeholder="Tijd" name="tijd">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Aantal</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Aantal" name="aantal">
  </div>
  <div class="form-group">
  <div class="form-group">
    <label for="exampleFormControlInput1">Aantal kinderen</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="aantal kinderen" name="aantal_k">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">allergieen</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="allergieen" name="allergieen">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">opmerkingen</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="opmerkingen" name="opmerkingen">
  </div>
  
  <button type="submit" class="btn btn-primary" name="add_reservering">Submit</button>
</form>
<!----------------------------- ADD RESERVERING FORM END ------------------------->

    
</body>
</html>