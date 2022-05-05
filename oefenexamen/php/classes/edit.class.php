<?php 

//VERWIJDEREN VAN DATA UIT DE DATABASE
require_once "dbh.class.php";

class Edit extends Dbh
{   //VERWIJDEREN VAN RESERVERINGEN 
    public function editReservering($tafel, $datum, $tijd, $aantal, $status, $aantal_k, $allergieen, $opmerkingen, $id)
    {
        $sql = "UPDATE reserveringen SET Tafel = ?, Datum = ?, Tijd= ?, Aantal= ?, Status= ?, Aantal_k= ?, Allergieen= ?, Opmerkingen= ? WHERE id= ?";
        $stmt = $this->connect()->prepare($sql);
        if ($stmt->execute([$tafel, $datum, $tijd, $aantal, $status, $aantal_k, $allergieen, $opmerkingen, $id])) {
            header('location: reserveringen.php');
        }
    }
}

if (isset($_POST['edit_reservering'])) {
    $id = $_GET['id'];
    $tafel = $_POST['tafel'];
    $datum = $_POST['datum'];
    $tijd = $_POST['tijd'];
    $aantal = $_POST['aantal'];
    $status = $_POST['status'];
    $aantal_k = $_POST['aantal_k'];
    $allergieen = $_POST['allergieen'];
    $opmerkingen = $_POST['opmerkingen'];   
    $editReservering = new Edit();
    $editReservering->editReservering($tafel, $datum, $tijd, $aantal, $status, $aantal_k, $allergieen, $opmerkingen, $id);
}
//END




?>