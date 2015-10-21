<?php

require_once("dbconfig.class.php");
require_once("entities/bestelregel.class.php");

class BestellingDAO {
       
    public static function getAllRegel($BestelID) {
        $sql = "SELECT * FROM bestelregel WHERE BestelID = '".$BestelID."'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $result = $dbh->query($sql);
        $arrBestellingen = array();
        foreach ($result as $rij) {
            $bestelling = new Cart($rij['BestelID'], $rij["KlantID"], $rij["Besteldatum"]);
            array_push($arrBestellingen, $bestelling);
        }
        $dbh = null;
        return $arrBestellingen;
      }

    public static function getBestellingFromId($id) {
        $sql = "select * from bestelling where BestelID=".$id;
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

    public static function createBestelling($KlantID, $Besteldatum) {
        $sql = "INSERT INTO bestelling (KlantID, Besteldatum) VALUES ('".$KlantID."', ".$Besteldatum.")";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $BestelId = $dbh->lastInsertId();
        $dbh=NULL;
        return $BestelId;
    }

  }
