<?php

if (isset($_SESSION['bestelregelarray'])) { 
    $arrBestelRegel = $_SESSION['bestelregelarray'];
}

if (isset($_GET['datum'])) { 
    $datum = $_GET['datum'];
}


if (isset($_GET['pay'])) {
    $prijs = $_GET['pay'];
    $bestelDoorgevoerd = bestelService::bestellingDoorvoeren($arrBestelRegel, $datum, $prijs);
    if ($bestelDoorgevoerd) {
        header("Location: ?page=besteloverzicht");
        die();
    }
    $msg = "Al besteld die dag. Opnieuw : ";
    $datum = "";
}

$min = date('Y-m-d', strtotime('tomorrow'));
$max = date('Y-m-d', strtotime('tomorrow + 2 day'));
$msg = "Datum : ";

if (isset($datum)) {
    if (($datum<$min||$datum>$max)&&$datum!=="") {
        $msg = "Foute datum ingegeven. Opnieuw : ";
        $error = TRUE;
    }
    $alBesteldOpDatum = bestelService::alBesteldDieDag($datum, $klantID);
    if ($alBesteldOpDatum) {
        $msg = "Al een bestelling op die datum. Opnieuw : ";
        $error = TRUE;
    }
}

if (isset($arrBestelRegel)) { 
    $klant = klantService::getKlantFromId($klantID);
    $naam = $klant->Naam." ".$klant->VNaam;
?>
        <div class="wrapper clearfix">
            <div class="txtC">
                <h1>Uw bestelling afrekenen.</h1> - <a href="?page=bestelling">Verder winkelen</a> -
            </div>
        </div>
    <?php
    if ((isset($datum)&&isset($error))||!isset($datum)) {
    ?>
        <div class="wrapper clearfix">
            <div class="txtC">
                <h3>Beste <?php print $naam;?> wanneer komt u afhalen?</h3>
                <form action="index.php" method="get">
                    <input type="hidden" name="page" value="afrekenen">
                    <?php print ($msg); ?><input type="date" name="datum" min="<?php print ($min); ?>" max="<?php print($max); ?>" value="<?php print ($min); ?>" autofocus=""></br></br>
                    <input type="submit" value="Verder.">
                </form>
            </div>
        </div>
    <?php 
    }
    if (isset($datum)&&!isset($error)) {
        $totprijs = bestelService::totaalBestelling($arrBestelRegel)
    ?>
        <div class="wrapper clearfix">
            <div class="txtC">
                <h3>Beste <?php print $naam; ?> Gelieve <strong>&euro; <?php print $totprijs; ?></strong> te betalen</h3>
                <a title="Betaal met BC" class="button" href="index.php?page=afrekenen&datum=<?php print $datum; ?>&pay=<?php print $totprijs; ?>"><span>Bacontact</span></a>
                <a title="Betaal met VISA" class="button" href="index.php?page=afrekenen&datum=<?php print $datum; ?>&pay=<?php print $totprijs; ?>"><span>Visa</span></a>
            </div>
        </div>
    <?php 
}
            include 'presentation/winkelkar.php';
    ?>
<?php } ?>