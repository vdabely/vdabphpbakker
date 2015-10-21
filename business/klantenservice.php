<?php

require_once("data/KlantenDAO.php");

class klantService {

    public static function getAllKlanten() {
        $arrAlleklanten = KlantenDAO::getAllKlanten();
        return $arrAlleklanten;
    }

    public static function getKlantFromId($id) {
      $objKlant = KlantenDAO::getKlantFromId($id);
      return $objKlant;
    }

    public static function getKlantFromEmail($email) {
      $objKlant = KlantenDAO::getKlantFromEmail($email);
      return $objKlant;
    }

 
}