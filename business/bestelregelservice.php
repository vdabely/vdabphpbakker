<?php

require_once("data/bestellingDAO.php");
require_once("data/bestelregelDAO.php");
require_once("entities/bestelregel.class.php");

class bestelRegelService {

    public static function bestelregelToevoegen($arrBestelRegel, $productID, $aantal) {
        /* returnt arrBestelRegel met toegevoegd of updated regel.*/
        $dubbel = bestelRegelService::checkAlBesteld($arrBestelRegel, $productID, $aantal);
        if (!$dubbel) {
            $objRegel = new Bestelregel($productID, $aantal);
            array_push($arrBestelRegel, $objRegel);
            return $arrBestelRegel;
            die();
        }
        return $dubbel;
    }

    public static function bestelregelAanpassen($arrBestelRegel, $productID, $aantal) {
        /* past regel in de array aan. */
        foreach ($arrBestelRegel as $regel){
            $regelID = $regel->productID;
            if ($productID==$regelID) {
                $regel->aantal = $aantal;
                return $arrBestelRegel;
                die();
            }
        }
    }

    private function checkAlBesteld($arrBestelRegel, $productID, $aantal) {
        /* als een product al in de array staat past hij die aan.
         * Returnd de aangepaste array als er dubbel is*/
        foreach ($arrBestelRegel as $regel){
            $regelID = $regel->productID;
            if ($productID==$regelID) {
                $NEWaantal = $aantal + $regel->aantal;
                $regel->aantal = $NEWaantal;
                return $arrBestelRegel;
                die();
            }
        }
    }
    
    public function winkelkarNietLeeg($arrBestelRegel) {
        /* check of de array leeg is of niet. */
        $aantal = 0;
        foreach ($arrBestelRegel as $regel){
            $aantal += $regel->aantal;
        }
        if ($aantal) {
            return TRUE;
            die();
        }
        return FALSE;
    }

    public static function totaalBestelling($arrBestelRegel) {
        /* return totaalprijs van de bestelling */
        $Prijs = 0;
        foreach ($arrBestelRegel as $regel){
            $product = productService::getProductFromId($regel->productID);
            $Prijs += $product->prijs * $regel->aantal;
        }
        return $Prijs;
    }
    
  public static function getBestelRegelsFromId($BestelID) {
    $arrBestelRegel = BestelRegelDAO::getBestellingRegelsFromId($BestelID);
    return $arrBestelRegel;
  }

}
