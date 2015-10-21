<?php

require_once("data/bestellingDAO.php");

class bestellingService {

  public static function getAllBestellingen() {
      $arrBestellingen = BestellingDAO::getAllBestellingen();
      return $arrBestellingen;
  }
  
  public static function getBestellingFromId($id) {
    $objBestelling = BestellingDAO::getBestellingFromId($id);
    return $objBestelling;
  }
  
  public static function addBestelregel($bestelID, $productId, $aantal) {
      
      
  }
  
}
