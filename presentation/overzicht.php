<?php
if (isset($_GET['verwijder'])) {
    bestellingService::verwijderBestelling($_GET['verwijder']);
}
?>
        <div class="wrapper clearfix">
            <div class="txtC">
                <h1>Besteloverzicht</h1>
            </div>
            <div class="wrapper clearfix txtC">
<?php
$nextdatum = "";
$arrBestellingen = bestellingService::getAllBestellingen();
foreach ($arrBestellingen as $bestelling) {
    $klantID = $bestelling->KlantID;
    $klant = klantService::getKlantFromId($klantID);
    $dbDatum = $bestelling->Besteldatum;
    $datum = date('d-m-Y',strtotime($dbDatum));
    $BestelID = $bestelling->BestelID;
    $klantnaam = $klant->Naam." ".$klant->VNaam;
    if ($nextdatum=="") {
        print ($datum."<hr/>");
    } else if ($nextdatum!=$dbDatum) {
        print ("<hr/>".$datum."<hr/>");
    }
    print ("<div class='innercontainer txtL'>&nbsp;");
    print ("<dl><dt>Bestelling voor ".$klantnaam." op ".$datum."</dt>");
    $totPrijs = $bestelling->Prijs;
    $arrBestelRegel = bestelRegelService::getBestelRegelsFromId($BestelID);
    foreach ($arrBestelRegel as $regel) {
        $productID = $regel->productID;
        $aantal = $regel->aantal;
        $product = productService::getProductFromId($productID);
        $productPrijs = $product->prijs;
        $prijs = $aantal * $productPrijs;
        if ($aantal) {
            print ("<dd>".$aantal." x ".$product->product." <strong>&euro; ".$productPrijs."</strong> = &euro; ".$prijs."</dd>");
        }
    }
        print ("<dt>Totaalprijs = &euro; ".$totPrijs."</dt>");
        print ("</dl><a href='?page=overzicht&verwijder=".$BestelID."'>bestelling verwijderen</a>");
    print ("</div>");
    $nextdatum = $dbDatum;
}
if (!$arrBestellingen) {
    print ("<dt>Geen bestellingen geplaatst.</dt>");
}
?>
            </div>
        </div>
