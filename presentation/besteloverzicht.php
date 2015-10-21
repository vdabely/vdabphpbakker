<?php
if (!isset($_COOKIE['LoginC'])) {
    header("Location: index.php?page=login");
    die();
}

$klantID = $_COOKIE['LoginC'];
?>
        <div class="wrapper clearfix">
            <div class="txtC">
                <h1>Besteloverzicht</h1>
            </div>
            <div class="wrapper clearfix">
<?php
$arrBestellingen = BestellingDAO::getAlleBestellingenVanKlant($klantID);
foreach ($arrBestellingen as $bestelling) {
    $datum = date('d-m-Y',strtotime($bestelling->Besteldatum));
    $BestelID = $bestelling->BestelID;
    print ("<dl><dt>Bestelling van ".$datum."</dt>");
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
    print ("<dd>------------------------------------------</dd><dd>&nbsp;&nbsp;Totaalprijs = &euro; ".$totprijs."</dd></dl>");
}
if (!$arrBestellingen) {
    print ("<dt>Geen bestellingen geplaatst.</dt>");
}
?>
                </dl>
            </div>
        </div>
