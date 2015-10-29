<?php
if (isset($_GET['aktief'])) {
    klantService::klantAktief($_GET['aktief']);
}
?>
        <div class="wrapper clearfix">
            <div class="txtC">
                <h1>Klantenoverzicht</h1>
            </div>
            <div class="wrapper clearfix txtC">
<?php
$arrAlleklanten = klantService::getAllKlanten();
foreach ($arrAlleklanten as $klant) {
    $klantID = $klant->KlantID;
    $klantNaam = $klant->Naam." ".$klant->VNaam;
    $klantAdres = $klant->Adres.", ".$klant->Postcode." ".$klant->Gemeente;
    $klantEmail = $klant->Email;
    if ($klant->Aktief) {
        $klantAktief = "";
        $klantDes = "Des-";
    }
    if (!$klant->Aktief) {
        $klantAktief = "Niet ";
        $klantDes = "";
    }
    if ($klantID!=='1') {
        print ("<div class='innercontainer txtL'>");
        print ("<dl><dt>".$klantNaam."</dt>");
        print ("<dd>".$klantAdres."</dd>");
        print ("<dd>".$klantEmail."</dd>");
        print ("<dd>Klant is <strong>".$klantAktief."</strong>Aktief</dd>");
        print ("</dl><a href='?page=klanten&aktief=".$klantID."'>".$klant->VNaam." ".$klantDes."Aktief zetten</a>");
        print ("</div>");
    }
}
if (!$arrAlleklanten) {
    print ("<dt>Geen bestellingen geplaatst.</dt>");
}
?>
                </dl>
            </div>
        </div>
