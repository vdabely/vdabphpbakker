<?php

require_once("dbconfig.class.php");
require_once("entities/bestelregel.class.php");

class BestelRegelDAO {
       
    public function createBestelRegel($BestelID, $ProductID, $Aantal, $Prijs) {
        // Schrijft Bestelregels weg in DB bestelregel
        $sql = "INSERT INTO bestelregel (BestelID, ProductID, Aantal, Prijs) VALUES (".$BestelID.", ".$ProductID.", ".$Aantal.", ".$Prijs.")";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh=NULL;
        return TRUE;
    }
    
    public static function getBestellingRegelsFromId($BestelID) {
        // return array van alle regels van BestelID
        $sql = "SELECT * FROM bestelregel WHERE BestelID='".$BestelID."'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $result = $dbh->query($sql);
        $arrBestelregel = array();
        foreach ($result as $rij) {
            $bestelregel = new Bestelregel($rij["ProductID"], $rij["Aantal"]);
            array_push($arrBestelregel, $bestelregel);
        }
        $dbh = null;
        if (isset($arrBestelregel)) {
            return $arrBestelregel;
        }
    }

      public function deleteBestelRegel($BestelID) {
        $sql = "DELETE FROM bestelregel WHERE BestelID = ".$BestelID;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh=NULL;
        return TRUE;
    }

}
