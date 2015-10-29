<?php

require_once("dbconfig.class.php");
require_once("entities/bestelling.class.php");

class BestellingDAO {
       
    public static function getAllBestellingen() {
        // return array van alle bestellingen
        $sql = "SELECT * FROM bestelling ORDER BY Besteldatum";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $result = $dbh->query($sql);
        $arrBestellingen = array();
        foreach ($result as $rij) {
            $objbestelling = new Bestel($rij['KlantID'], $rij['BestelID'], $rij["Besteldatum"], $rij["Prijs"]);
            array_push($arrBestellingen, $objbestelling);
        }
        $dbh = null;
        return $arrBestellingen;
      }

    public static function getBestellingFromId($bestelID) {
        // return object van een bestelling van een BestelID
        $sql = "select * from bestelling where BestelID=".$bestelID;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $result = $dbh->query($sql);
        foreach ($result as $rij) {
            $objBestelling = new Cart($rij['BestelID'], $rij["KlantID"], $rij["Besteldatum"]);
        }
        $dbh = null;
        if (isset($objBestelling)) {
            return $objBestelling;
        }
    }

    public static function getAlleBestellingenVanKlant($KlantID) {
        // return array van alle bestellingen van een KlantID
        $sql = "SELECT * FROM bestelling WHERE KlantID = '".$KlantID."' ORDER BY Besteldatum";
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

      public static function createBestelling($KlantID, $Besteldatum, $arrBestelRegel, $prijs) {
        // Schrijft Bestelling weg in DB bestelling
        $sql = "INSERT INTO bestelling (KlantID, Besteldatum, Prijs) VALUES ('".$KlantID."', '".$Besteldatum."', '".$prijs."')";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $BestelID = $dbh->lastInsertId();
        $dbh=NULL;
        return $BestelID;
    }

    public function deleteBestelling($BestelID) {
        // Verwijderd een bestelling uit DB met een bepaald BestelID
        $sql = "DELETE FROM bestelling WHERE BestelID = ".$BestelID;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh=NULL;
    }

  }
