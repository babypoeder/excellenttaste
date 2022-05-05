

<?php

session_start();

require("../classes/data.class.php");


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>oefen examen</title>
</head>
<body>
<!----------------------------- BON BEGIN ------------------------->
<table>
    <thead>
        <tr>
            <th>Naam</th>
            <th>aantal</th>
            <th>prijs</th>
            <th>Totaal</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        

            $printBon = new Data;
            $printBon->getBon($_GET['id']);

        
        ?>
    </tbody>
    <tbody>
      <tr>
        <th>Totaal</th>
        <td></td>
        <td></td>
        <td id='totaalprijs'></td>
      </tr>
    </tbody>
</table>
<!----------------------------- BON EIND ------------------------->
<!----------------------------- BON UITPRINTEN START ------------------------->
<!-- HIERMEE MAAK JE EEN BUTTON AAN WAARMEE JE DE PRINT FUNCTIE GEBRUIKT-->
<button onclick="printFunction()">Print</button>​
 
    <script>
      //met deze script zorg je ervoor dat je html page uitgeprint word!
      function printFunction() { 
        window.print(); 
      }

      var summ = 0;
      $(document.getElementById("normaalprijs")).each(function() {
      summ += Number($(this).text());
      });;
      document.getElementById("totaalprijs").innerHTML = summ;
    </script>
<!----------------------------- BON UITPRINTEN EIND ------------------------->
    
</body>
</html>