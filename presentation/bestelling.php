<?php
if (isset($_GET['winkelkar'])&&$_GET['winkelkar']=='leeg') {
    session_destroy();
    header("Location: index.php?page=bestel");
    die();
}

if (!isset($_GET['product'])&&!isset($_SESSION['bestelregelarray'])) {
    header("Location: index.php?page=bestel");
    die();
}

if (isset($_GET['product']) && $_GET['page']=='bestelling') {
    $IDproduct = productService::getProductFromId($_GET['product']);
    if (isset($_GET['aantal'])) {
        $_SESSION['bestelregelarray'] = bestelService::bestelregelToevoegen($_SESSION['bestelregelarray'], $_GET['product'], $_GET['aantal'], '1');
    }
}

if ((isset($_SESSION['bestelregelarray'])&&!empty($_SESSION['bestelregelarray']))||(isset($_GET['product']) && $_GET['page']=='bestelling')) { 

    if (!isset ($_GET['aantal'])&&isset($_GET['product'])) {
?>
        <div class="wrapper clearfix">
            <div class="txtC">
                <h1>Hoeveel <?php print ($IDproduct->categorie); ?> had u gewenst?</h1>
                <form action="index.php" method="get">
                    <input type="hidden" name="page" value="bestelling">
                    <input type="hidden" name="product" value="<?php print($IDproduct->id); ?>">
                    <input type="text" name="aantal" value="1" style="width: 30px;" autofocus=""><?php print (" x <strong>".$IDproduct->product."</strong> aan &euro; ".$IDproduct->prijs); ?></br></br>
                    <input type="submit" value="voeg toe.">
                </form>
            </div>
        </div>
<?php 
    }
    include 'presentation/winkelkar.php';
}
    include 'presentation/bestel.php';
?>