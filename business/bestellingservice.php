<?php

require_once("data/bestellingDAO.php");
require_once("data/bestelregelDAO.php");

class bestellingService {

    public static function getAllBestellingen() {
        // Haalt alle bestellingen op.
        $arrBestellingen = BestellingDAO::getAllBestellingen();
        return $arrBestellingen;
    }

    public static function getBestellingFromId($bestelID) {
        /* Haalt bestelling uit DB met een BestelID */
        $objBestelling = BestellingDAO::getBestellingFromId($bestelID);
        return $objBestelling;
    }

    public static function getBestellingFromKlantId($KlantID) {
        // Haalt bestellingen uit DB van Klant met KlantID
        $arrBestellingen = BestellingDAO::getAlleBestellingenVanKlant($KlantID);
        return $arrBestellingen;
    }

    public function bestellingDoorvoeren($arrBestelRegel, $datum, $prijs, $KlantID) {
        // Voert een bestelling door naar DB
        $albestelddiedag = bestellingService::alBesteldDieDag($datum, $KlantID);
        if (!$albestelddiedag) {
            $BestelID = BestellingDAO::createBestelling($KlantID, $datum, $arrBestelRegel, $prijs);
            foreach ($arrBestelRegel as $regel) {
                $Aantal = $regel->aantal;
                if ($Aantal) {
                    $ProductID = $regel->productID;
                    $product = productService::getProductFromId($ProductID);
                    $productPrijs = $product->prijs;
                    $Prijs = $Aantal * $productPrijs;
                    BestelRegelDAO::createBestelRegel($BestelID, $ProductID, $Aantal, $Prijs);
                    $Aantal=0;
                }
            }
            unset($_SESSION['bestelregelarray']);
            return TRUE;
        }
        if ($albestelddiedag) {
            return FALSE;
        }
    }
    
    public function alBesteldDieDag($datum, $klantID) {
        // Controleerd of klantID al besteld heeft voor die dag. return false als hij al besteld heeft
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
    
    public function verwijderBestelling($BestelID) {
        // verwijdert een bestelling uit zowel bestellingen als uit bestelregel
        BestellingDAO::deleteBestelling($BestelID);
        BestelRegelDAO::deleteBestelRegel($BestelID);
    }

}
