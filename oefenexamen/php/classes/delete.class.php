<?php 

session_start();

require "dbh.class.php";

class Delete extends Dbh
{
    public function DeleteReserveringen($id)
    {
        $sql = "DELETE FROM reserveringen WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            header("location: ../pages/reserveringen.php");
        }   
    }
    
    public function DeleteKlant($id)
    {
        $sql = "DELETE FROM klanten WHERE ID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            header("location: ../pages/klanten.php");
        }   
    }

    public function DeleteCategorie($id)
    {
        $sql = "DELETE FROM gerechtcategorien WHERE ID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            header("location: ../pages/gerechtcategorien.php");
        }   
    }

    public function DeleteSoort($id)
    {
        $sql = "DELETE FROM gerechtsoorten WHERE ID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            header("location: ../pages/gerechtsoorten.php");
        }   
    }

    public function DeleteBestelling($id)
    {
        $sql = "DELETE FROM bestellingen WHERE ID = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            header("location: ../pages/bestellingen.php");
        }   
    }
}

if (isset($_GET['ReserveringID'])) {
    $id = $_GET['ReserveringID'];
    $deleteReservering = new Delete();
    $deleteReservering->DeleteReserveringen($id);
}

if (isset($_GET['KlantID'])) {
    $id = $_GET['KlantID'];
    $deleteKlant = new Delete();
    $deleteKlant->DeleteKlant($id);
}

if (isset($_GET['CategorieID'])) {
    $id = $_GET['CategorieID'];
    $deleteCategorie = new Delete();
    $deleteCategorie->DeleteCategorie($id);
}

if (isset($_GET['SoortID'])) {
    $id = $_GET['SoortID'];
    $deleteSoort = new Delete();
    $deleteSoort->DeleteSoort($id);
}

if (isset($_GET['BestellingID'])) {
    $id = $_GET['BestellingID'];
    $deleteBestelling = new Delete();
    $deleteBestelling->DeleteBestelling($id);
}
?>