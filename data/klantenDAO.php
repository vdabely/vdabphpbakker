<?php

require_once("dbconfig.class.php");
require_once("entities/klanten.class.php");

class KlantenDAO {
       
    public static function getAllKlanten() {
        $sql = "select * from klanten";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $result = $dbh->query($sql);
        $arrKlanten = array();
        foreach ($result as $rij) {
            $klant = new Klant($rij['KlantID'], $rij["Email"], $rij["Paswoord"], $rij["Naam"], $rij["VNaam"], $rij["Adres"], $rij["Postcode"], $rij["Gemeente"], $rij["Aktief"]);
            array_push($arrKlanten, $klant);
        }
        $dbh = null;
        return $arrBestellingen;
      }

    public static function getKlantFromId($id) {
        $sql = "select * from klanten where KlantID=".$id;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $result = $dbh->query($sql);
        foreach ($result as $rij) {
            $objKlant = new Klant($rij["KlantID"], $rij["Email"], $rij["Paswoord"], $rij["Naam"], $rij["Vnaam"], $rij["Adres"], $rij["Postcode"], $rij["Gemeente"], $rij["Aktief"]);
        }
        $dbh = null;
        if (isset($objKlant)) {
            return $objKlant;
        }
    }

    public static function getKlantFromEmail($email) {
        $sql = "select * from klanten where Email='".$email."'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $result = $dbh->query($sql);
        if (!$result) {
            return null;
        } else {
            foreach ($result as $rij) {
                $objKlant = new Klant($rij["KlantID"], $rij["Email"], $rij["Paswoord"], $rij["Naam"], $rij["Vnaam"], $rij["Adres"], $rij["Postcode"], $rij["Gemeente"], $rij["Aktief"]);
                return $objKlant;
            }
        }
        $dbh = null;
    }

    public static function createKlant($Email, $Paswoord, $Naam, $VNaam, $Adres, $Postcode, $Gemeente, $Aktief) {
        $sql = "INSERT INTO klanten (Email, Paswoord, Naam, Vnaam, Adres, Postcode, Gemeente, Aktief) VALUES ('".$Email."', '".$Paswoord."', '".$Naam."', '".$VNaam."', '".$Adres."', '".$Postcode."', '".$Gemeente."', '".$Aktief."');";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $KlantId = $dbh->lastInsertId();
        $dbh=NULL;
        return $KlantId;
    }

  }
