<?php
if (!isset($_COOKIE['LoginC'])) {
    header("Location: index.php?page=login");
    die();
}

    $arrBestelRegel = $_SESSION['bestelregelarray'];
    $karNietLeeg = bestelService::winkelkarNietLeeg($arrBestelRegel);

if (isset($arrBestelRegel)&&$karNietLeeg) {
?>
        <div class="wrapper clearfix">
            <div class="txtC">
                <h1>Uw bestelling.</h1>
<?php if (!isset($_GET['winkelkar'])&&$_GET['page']!=='afrekenen') { ?>
                - <a href="?page=bestelling&winkelkar=leeg">Anuleren</a> - 
                <a href="?page=wijzigen">Wijzigen</a> -
                <a href="?page=afrekenen&winkelkar=afrekenen">Afrekenen</a> -
<?php } ?>
            </div>
            <div class="wrapper clearfix">
                <?php 
                    $totprijs=0;
                    foreach ($_SESSION['bestelregelarray'] as $regel){
                        $productID = $regel->productID;
                        $aantal = $regel->aantal;
                        $product = productService::getProductFromId($productID);
                        $productPrijs = $product->prijs;
                        $prijs = $aantal * $productPrijs;
                        if ($aantal) {
                            print ($aantal." x ".$product->product." <strong>&euro; ".$productPrijs."</strong> = &euro; ".$prijs."</br>");
                        }
                        $totprijs += $prijs;
                    }
                    print ("------------------------------<br>&nbsp;&nbsp;Totaalprijs = &euro; ".$totprijs);
                ?>
            </div>
        </div>
<?php 
    }
?>