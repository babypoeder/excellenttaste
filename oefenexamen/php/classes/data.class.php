<?php

require("dbh.class.php");

class Data extends Dbh
{

    public function getReserveringen() 
    {
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        } else {
            $sort = 'Datum';
        }
        
        $sql = "SELECT * FROM reserveringen ORDER BY $sort";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        //HIERMEE WORD ALLE INFORMATIE VAN DE RESERVERING TABLE OPGEHAALD EN GEDISPLAYD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["Tafel"] . '</td>';
            echo '<td>' . $row["Datum"] . '</td> ';
            echo '<td>' . $row["Tijd"] . '</td> ';
            echo '<td>' . $row["Aantal"] . '</td> ';
            if($row['Status'] == "1"){
                echo '<td>Niet Aangekomen</td> ';
            } else {
                echo '<td>Aangekomen</td> ';
            }
            echo '<td>' . $row["Aantal_k"] . '</td> ';
            echo '<td>' . $row["Allergieen"] . '</td> ';
            echo '<td>' . $row["Opmerkingen"] . '</td> ';
            echo '<td>' . "<a href='../pages/edit_reservering.php?ReserveringID=$row[ID]'><button type='button' class='btn btn-dark'>edit</button></a>" . '</td>';
            echo '<td>' . "<a href='../classes/delete.class.php?ReserveringID=$row[ID]'><button type='button' class='btn btn-dark'>delete</button></a>" . '</td>';
            echo '</tr>';
        }
    }
    //END

    public function getKlanten()
    {
        $sql = "SELECT * FROM klanten";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        //HIERMEE WORD ALLE INFORMATIE VAN DE KLANTEN TABLE OPGEHAALD EN GEDISPLAYD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["Naam"] . '</td>';
            echo '<td>' . $row["Telefoon"] . '</td> ';
            echo '<td>' . $row["Email"] . '</td> ';
            echo '<td>' . "<a href='../classes/delete.class.php?KlantID=$row[ID]'><button type='button' class='btn btn-dark'>delete</button></a>" . '</td>';
            echo '</tr>';
        }
    }

    public function getGerechtcategorien()
    {
        $sql = "SELECT * FROM gerechtcategorien";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        //HIERMEE WORD ALLE INFORMATIE VAN DE GERECHTCATEGORIEN TABLE OPGEHAALD EN GEDISPLAYD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["Code"] . '</td>';
            echo '<td>' . $row["Naam"] . '</td> ';
            echo '<td>' . "<a href='../classes/delete.class.php?CategorieID=$row[ID]'><button type='button' class='btn btn-dark'>delete</button></a>" . '</td>';
            echo '</tr>';
        }
    }

    public function getGerechtsoorten()
    {
        $sql = "SELECT gerechtsoorten.ID, gerechtsoorten.Code, gerechtsoorten.Naam, gerechtcategorien.Naam FROM gerechtsoorten INNER JOIN gerechtcategorien ON gerechtsoorten.Gerechtcategorie_ID=gerechtcategorien.ID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        //HIERMEE WORD ALLE INFORMATIE VAN DE GERECHTCATEGORIEN TABLE OPGEHAALD EN GEDISPLAYD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["Code"] . '</td>';
            echo '<td>' . $row[""] . '</td> ';
            echo '<td>' . $row["Naam"] . '</td> ';
            echo '<td>' . "<a href='../classes/delete.class.php?SoortID=$row[ID]'><button type='button' class='btn btn-dark'>delete</button></a>" . '</td>';
            echo '</tr>';
        }
    }

    public function GerechtcategorienOpties()
    {
        $sql = "SELECT * FROM gerechtcategorien";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        //HIERMEE WORD ALLE INFORMATIE VAN DE GERECHTCATEGORIEN TABLE OPGEHAALD EN GEDISPLAYD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value=' . $row["ID"] .'>'. $row["Naam"] . '</option>';
        }
    }

    public function getMenuItems()
    {
        $sql = "SELECT * FROM menuitems";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        //HIERMEE WORD ALLE INFORMATIE VAN DE GERECHTCATEGORIEN TABLE OPGEHAALD EN GEDISPLAYD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td name="menuitem_id" hidden>' . $row["ID"] . '</td>';
            echo '<td>' . $row["Naam"] . '</td>';
            echo '<td>' . $row["Prijs"] . '</td> ';
            echo '<td><input type="number" class="form-control" id="exampleFormControlInput1" placeholder="aantal" name="aantal"></td> ';
            echo '<td>' . "<button type='submit' class='btn btn-dark'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-lg' viewBox='0 0 16 16' name='add_bestelling'>
            <path fill-rule='evenodd' d='M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z'/>
          </svg></button>" . '</td>';
            echo '</tr>';
        }
    }

    public function getBestellingen()
    {
        $sql = "SELECT bestellingen.ID, reserveringen.Tafel, menuitems.Naam AS menuitem, bestellingen.Aantal, bestellingen.Geserveerd FROM bestellingen INNER JOIN reserveringen ON bestellingen.Reservering_ID=reserveringen.ID INNER JOIN menuitems ON bestellingen.Menuitem_ID=menuitems.ID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        //HIERMEE WORD ALLE INFORMATIE VAN DE GERECHTCATEGORIEN TABLE OPGEHAALD EN GEDISPLAYD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["Tafel"] . '</td>';
            echo '<td>' . $row["menuitem"] . '</td> ';
            echo '<td>' . $row["Aantal"] . '</td> ';
            if($row['Geserveerd'] == "1"){
                echo '<td>Nee</td> ';
            } else {
                echo '<td>Ja</td> ';
            }
            echo '<td>' . "<a href='../classes/delete.class.php?BestellingID=$row[ID]'><button type='button' class='btn btn-dark'>delete</button></a>" . '</td>';
            echo '</tr>';
        }
    }

    public function getTafel()
    {
        $sql = "SELECT reserveringen.ID, reserveringen.Tafel, klanten.Naam FROM reserveringen INNER JOIN klanten ON reserveringen.Klant_ID=klanten.ID";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        //HIERMEE WORD ALLE INFORMATIE VAN DE GERECHTCATEGORIEN TABLE OPGEHAALD EN GEDISPLAYD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row["Tafel"] . '</td>';
            echo '<td>' . $row["Naam"] . '</td> ';
            echo '<td>' . "<a href='bon.php?id=$row[ID]'><button type='button' class='btn btn-dark' name='getBon'>Bon</button></a>" . '</td>';
            echo '</tr>';
        }
    }

    public function getBon($id)
    {
        $sql = "SELECT bestellingen.Reservering_ID, bestellingen.Aantal, menuitems.Naam AS itemnaam, menuitems.Prijs AS prijs FROM bestellingen JOIN menuitems ON bestellingen.Menuitem_ID=menuitems.ID WHERE Reservering_ID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        //HIERMEE WORD ALLE INFORMATIE VAN DE GERECHTCATEGORIEN TABLE OPGEHAALD EN GEDISPLAYD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $totaalItem = $row['Aantal'] * $row['prijs'];
            echo '<tr>';
            echo '<td>' . $row["itemnaam"] . '</td> ';
            echo '<td>' . $row["Aantal"] . '</td> ';
            echo '<td>' . $row["prijs"] . '</td> ';
            echo '<td class="normaalprijs">' . $totaalItem . '</td> ';
            echo '</tr>';
        }
    }

    public function GerechtsoortenOpties()
    {
        $sql = "SELECT * FROM gerechtsoorten";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        //HIERMEE WORD ALLE INFORMATIE VAN DE GERECHTCATEGORIEN TABLE OPGEHAALD EN GEDISPLAYD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value=' . $row["ID"] .'>'. $row["Naam"] . '</option>';
        }
    }

    public function ReserveringOpties()
    {
        $sql = "SELECT * FROM reserveringen";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        //HIERMEE WORD ALLE INFORMATIE VAN DE GERECHTCATEGORIEN TABLE OPGEHAALD EN GEDISPLAYD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value=' . $row["ID"] .'>'. $row["Tafel"] . '</option>';
        }
    }

    public function MenuitemOpties()
    {
        $sql = "SELECT * FROM menuitems";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        //HIERMEE WORD ALLE INFORMATIE VAN DE GERECHTCATEGORIEN TABLE OPGEHAALD EN GEDISPLAYD
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value=' . $row["ID"] .'>'. $row["Naam"] . '</option>';
        }
    }
}



?>