        <div class="wrapper clearfix">
            <div class="txtC">
                <h1>Besteloverzicht</h1>
            </div>
            <div class="wrapper clearfix txtC">
<?php
$arrBestellingen = BestellingDAO::getAlleBestellingenVanKlant($klantID);
foreach ($arrBestellingen as $bestelling) {
    print ("<div class='innercontainer txtL'>");
    $datum = date('d-m-Y',strtotime($bestelling->Besteldatum));
    $BestelID = $bestelling->BestelID;
    print ("<dl><dt>Bestelling voor ".$datum."</dt>");
    $arrBestelling = BestellingDAO::getBestellingRegelsFromId($BestelID);
    $totprijs=0;
    foreach ($arrBestelling as $regel) {
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
    print ("<dt>Totaalprijs = &euro; ".$totprijs."</dt>");
    print ("<dt></dt></dl>");
    print ("</div>");
}
if (!$arrBestellingen) {
    print ("<dt>Geen bestellingen geplaatst.</dt>");
}
?>
                </dl>
            </div>
        </div>
