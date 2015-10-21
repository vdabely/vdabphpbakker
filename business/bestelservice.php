<?php

require_once("data/bestellingDAO.php");
require_once("entities/bestelregel.class.php");

class bestelService {

    public static function bestelregelToevoegen($arrBestelRegel, $productID, $aantal) {
        /* returnt arrBestelRegel met toegevoegd of updated regel.*/
        $dubbel = bestelService::checkAlBesteld($arrBestelRegel, $productID, $aantal);
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
    
    public function bestellingDoorvoeren($arrBestelRegel, $datum, $prijs) {
        /* Voert een bestelling door naar DB */
        $KlantID = $_COOKIE['LoginC'];
        $BestelID = BestellingDAO::createBestelling($KlantID, $datum, $arrBestelRegel, $prijs);
        foreach ($arrBestelRegel as $regel) {
            $Aantal = $regel->aantal;
            if ($Aantal) {
                $ProductID = $regel->productID;
                $product = productService::getProductFromId($ProductID);
                $productPrijs = $product->prijs;
                $Prijs = $Aantal * $productPrijs;
                BestellingDAO::createBestelRegel($BestelID, $ProductID, $Aantal, $Prijs);
                $Aantal=0;
            }
        }
        session_destroy();
        return TRUE;
    }
    
    public function alBesteldDieDag($datum, $klantID) {
        /* Controleerd of die mens al besteld heeft voor die dag.
         * return false als hij al besteld heeft         */
        $arrBestellingen = BestellingDAO::getAlleBestellingenVanKlant($klantID);
        foreach ($arrBestellingen as $rij) {
            $DBdatum = $rij->Besteldatum;
            if ($DBdatum == $datum) {
                return TRUE;
                die();
            }
        }
        return FALSE;
    }

}
