<?php

if (isset($_GET['product'])&&isset($_GET['aantal'])) {
    $_SESSION['bestelregelarray'] = bestelService::bestelregelAanpassen($_SESSION['bestelregelarray'], $_GET['product'], $_GET['aantal']);
} 

$arrBestelRegel = $_SESSION['bestelregelarray'];
$karNietLeeg = bestelService::winkelkarNietLeeg($arrBestelRegel);

if (!$karNietLeeg) {
    header("Location: index.php?page=bestelling");
    die();
}

?>
        <div class="wrapper clearfix">
            <div class="txtC">
                <h1>Uw bestelling wijzigen.</h1> 
                - <a href="?page=bestelling&winkelkar=leeg">Anuleren</a>
                - <a href="?page=bestelling">Verder winkelen</a> 
                - <a href="?page=afrekenen&winkelkar=afrekenen">Afrekenen</a> -
            </div>
            <div class="innercontainer">
                <dl>
                    <dt>Winkelmandje aanpassen</dt>
                <?php 
                    $totprijs=0;
                    foreach ($arrBestelRegel as $regel){
                        $productID = $regel->productID;
                        $aantal = $regel->aantal;
                        $product = productService::getProductFromId($productID);
                        $productPrijs = $product->prijs;
                        $prijs = $aantal * $productPrijs;
                        if ($aantal) {
                            print ("<dd><a href='?page=wijzigen&winkelkar=wijzigen&product=".$productID."'&aantal='".$aantal."'>".$aantal." x ".$product->product." <strong>&euro; ".$productPrijs."</strong></a> = &euro; ".$prijs." <a href='?page=wijzigen&winkelkar=wijzigen&product=".$productID."&aantal=0'> Haal dit uit winkelmand</a></dd>");
                        }
                        $totprijs += $prijs;
                    }
                    print ("<hr>&nbsp;&nbsp;Totaalprijs = &euro; ".$totprijs);
                ?>
                </dl>
            </div>
        </div>
    <?php 
        if (isset($_GET['product'])&&!isset($_GET['aantal'])) { 
            $IDproduct = productService::getProductFromId($_GET['product']);
    ?>
        <div class="wrapper clearfix">
            <div class="txtC">
                <h1>Hoeveel <?php print ($IDproduct->categorie); ?> had u er dan gewenst?</h1>
                <form action="index.php" method="get">
                    <input type="hidden" name="page" value="wijzigen">
                    <input type="hidden" name="winkelkar" value="wijzigen">
                    <input type="hidden" name="product" value="<?php print($IDproduct->id); ?>">
                    <input type="text" name="aantal" value="" style="width: 30px;" autofocus=""><?php print (" x ".$IDproduct->product." aan &euro; ".$IDproduct->prijs); ?></br>
                    <input type="submit" value="Pas aan.">
                </form>
            </div>
        </div>
    <?php 
    }
?>