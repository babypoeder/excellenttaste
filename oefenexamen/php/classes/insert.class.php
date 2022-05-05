<?php 

require_once "dbh.class.php";

class Add extends Dbh
{
    public function addReservering($naam, $telefoon, $email, $tafel, $datum, $tijd, $aantal, $aantal_k, $allergieen, $opmerkingen)
    {
        $sql = "

        BEGIN;
        INSERT INTO klanten (Naam, Telefoon, Email)
        VALUES(:naam, :telefoon, :email);
        INSERT INTO reserveringen (Tafel, Datum, Tijd, Aantal, Aantal_k, Allergieen, Opmerkingen, Klant_ID) 
        VALUES( :tafel, :datum, :tijd, :aantal, :aantal_k, :allergieen, :opmerkingen, LAST_INSERT_ID());
        COMMIT;
        
        ";

        
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":naam", $naam);
        $stmt->bindParam(":telefoon", $telefoon);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":tafel", $tafel);
        $stmt->bindParam(":datum", $datum);
        $stmt->bindParam(":tijd", $tijd);
        $stmt->bindParam(":aantal", $aantal);
        $stmt->bindParam(":aantal_k", $aantal_k);
        $stmt->bindParam(":allergieen", $allergieen);
        $stmt->bindParam(":opmerkingen", $opmerkingen);
        $stmt->execute();
        header('location: reserveringen.php');
    }

    public function addGerechtcategorie($code, $naam)
    {
        $sql = "INSERT INTO gerechtcategorien(Code, Naam) VALUES (?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code, $naam]);
        header('location: gerechtcategorien.php');
    }

    public function addGerechtsoort($code, $naam, $gerechtcategorie_id)
    {
        $sql = "INSERT INTO gerechtsoorten(Code, Naam, Gerechtcategorie_ID) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code, $naam, $gerechtcategorie_id]);
        header('location: gerechtsoorten.php');
    }

    public function addMenuitem($code, $naam, $prijs, $gerechtsoort_id)
    {
        $sql = "INSERT INTO menuitems(Code, Naam, Prijs, Gerechtsoort_ID) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code, $naam, $prijs, $gerechtsoort_id]);
        header('location: menu_items.php');
    }

    public function addBestelling($reservering_id, $menuitem_id, $aantal, $geserveerd)
    {
        $sql = "INSERT INTO bestellingen(Reservering_ID, Menuitem_ID, Aantal, Geserveerd) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$reservering_id, $menuitem_id, $aantal, $geserveerd]);
        header('location: bestellingen.php');
    }
}

if (isset($_POST['add_reservering'])) {
    $naam = $_POST["naam"];
    $telefoon = $_POST["telefoon"];
    $email = $_POST["email"];
    $tafel = $_POST["tafel"];
    $datum = $_POST["datum"];
    $tijd = $_POST["tijd"];
    $aantal = $_POST["aantal"];
    $aantal_k = $_POST["aantal_k"];
    $allergieen = $_POST["allergieen"];
    $opmerkingen = $_POST["opmerkingen"];
    $addReservering = new Add();
    $addReservering->addReservering($naam, $telefoon, $email, $tafel, $datum, $tijd, $aantal, $aantal_k, $allergieen, $opmerkingen);
}

if (isset($_POST['add_gerechtcategorie'])) {
    $code = $_POST["code"];
    $naam = $_POST["naam"];
    $addCategorie = new Add();
    $addCategorie->addGerechtcategorie($code, $naam);
}

if (isset($_POST['add_gerechtsoort'])) {
    $code = $_POST["code"];
    $naam = $_POST["naam"];
    $gerechtcategorie_id = $_POST["gerechtcategorie_id"];
    $addSoort = new Add();
    $addSoort->addGerechtsoort($code, $naam, $gerechtcategorie_id);
}

if (isset($_POST['add_menuitem'])) {
    $code = $_POST["code"];
    $naam = $_POST["naam"];
    $prijs = $_POST["prijs"];
    $gerechtsoort_id = $_POST["gerechtsoort_id"];
    $addMenuItem = new Add();
    $addMenuItem->addMenuItem($code, $naam, $prijs, $gerechtsoort_id);
}

if (isset($_POST['add_bestelling'])) {
    $reservering_id = $_POST["reservering_id"];
    $menuitem_id = $_POST["menuitem_id"];
    $aantal = $_POST["aantal"];
    $geserveerd = $_POST["geserveerd"];
    $addBestelling = new Add();
    $addBestelling->addBestelling($reservering_id, $menuitem_id, $aantal, $geserveerd);
}

?>