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
    
    public function maakKlant($Email, $Paswoord, $Naam, $Vnaam, $Adres, $Postcode, $Gemeente, $Aktief) {
        $objKlant = KlantenDAO::createKlant($Email, $Paswoord, $Naam, $Vnaam, $Adres, $Postcode, $Gemeente, $Aktief);
        return $objKlant;
    }

}
