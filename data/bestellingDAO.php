<?php

require_once("dbconfig.class.php");
require_once("entities/bestelling.class.php");

class BestellingDAO {
       
    public static function getAlleBestellingen() {
        /* return array van alle bestellingen */
        $sql = "SELECT * FROM bestelling";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $result = $dbh->query($sql);
        $arrBestellingen = array();
        foreach ($result as $rij) {
            $bestelling = new Bestel($rij['KlantID'], $rij['BestelID'], $rij["KlantID"], $rij["Besteldatum"]);
            array_push($arrBestellingen, $bestelling);
        }
        $dbh = null;
        return $arrBestellingen;
      }
    public static function getAlleBestellingenVanKlant($KlantID) {
        /* return array van alle bestellingen van een KlantID */
        $sql = "SELECT * FROM bestelling WHERE KlantID = '".$KlantID."'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $result = $dbh->query($sql);
        $arrBestellingen = array();
        foreach ($result as $rij) {
            $bestelling = new Bestel( $rij["KlantID"], $rij['BestelID'], $rij["Besteldatum"], $rij["Prijs"]);
            array_push($arrBestellingen, $bestelling);
        }
        $dbh = null;
        return $arrBestellingen;
      }

    public static function getBestellingRegelsFromId($BestelID) {
        /*return array van alle regels van BestelID */
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

    public static function createBestelling($KlantID, $Besteldatum, $arrBestelRegel, $prijs) {
        /*Schrijft Bestelling weg in DB bestelling*/
        $sql = "INSERT INTO bestelling (KlantID, Besteldatum, Prijs) VALUES ('".$KlantID."', '".$Besteldatum."', '".$prijs."')";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $BestelID = $dbh->lastInsertId();
        $dbh=NULL;
        return $BestelID;
    }

    public function createBestelRegel($BestelID, $ProductID, $Aantal, $Prijs) {
        /*Schrijft Bestelling weg in DB bestelregel*/
        $sql = "INSERT INTO bestelregel (BestelID, ProductID, Aantal, Prijs) VALUES (".$BestelID.", ".$ProductID.", ".$Aantal.", ".$Prijs.")";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh=NULL;
        return TRUE;
    }

  }
