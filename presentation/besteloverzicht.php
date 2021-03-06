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
$arrBestellingen = bestellingService::getBestellingFromKlantId($klantID);
foreach ($arrBestellingen as $bestelling) {
    print ("<div class='innercontainer txtL'>&nbsp;");
    $dbDatum = $bestelling->Besteldatum;
    $datum = date('d-m-Y',strtotime($dbDatum));
    $BestelID = $bestelling->BestelID;
    print ("<dl><dt>Bestelling voor ".$datum."</dt>");
    $arrBestelRegel = bestelRegelService::getBestelRegelsFromId($BestelID);
    $totprijs=0;
    foreach ($arrBestelRegel as $regel) {
        $productID = $regel->productID;
        $aantal = $regel->aantal;
        $product = productService::getProductFromId($productID);
        $productPrijs = $product->prijs;
        $prijs = $aantal * $productPrijs;
        if ($aantal) {
            print ("<dd>".$aantal." x ".$product->product." <strong>&euro; ".$productPrijs."</strong> = &euro; ".$prijs."</dd>");
        }
        $totprijs += $prijs;
    }
    print ("<dt>Totaalprijs = &euro; ".$totprijs."</dt></dl>");
    if ($dbDatum>date('Y-m-d', time()+86400)) {
        print ("<a href='?page=besteloverzicht&verwijder=".$BestelID."'>bestelling anulleren</a>");
    }
    print ("&nbsp;</div>");
}
if (!$arrBestellingen) {
    print ("<dt>Geen bestellingen geplaatst.</dt>");
}
?>
            </div>
        </div>
