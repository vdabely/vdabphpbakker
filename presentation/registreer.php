<?php 

$Vnaam = klantService::isPostSet('Vnaam');
$Naam = klantService::isPostSet("Naam");
$Adres = klantService::isPostSet("Adres");
$Postcode = klantService::isPostSet("Postcode");
$Gemeente = klantService::isPostSet("Gemeente");
$Email = klantService::isPostSet("Email");
//$Paswoord1 = klantService::isPostSet("Paswoord1");
//$Paswoord2 = klantService::isPostSet("Paswoord2");
$Aktief = klantService::isPostSet("Aktief");

if (isset($_POST['Aktief'])) {
//    if ($Vnaam&&$Naam&&$Adres&&$Postcode&&$Gemeente&&$Email&&$Paswoord1&&$Paswoord2&&$Paswoord1==$Paswoord2) {
    if ($Vnaam&&$Naam&&$Adres&&$Postcode&&$Gemeente&&$Email) {
        $length = 6;
        $Paswoord = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        $DBPaswoord = sha1($Paswoord);
        $registreer = klantService::maakKlant($Email, $DBPaswoord, $Naam, $Vnaam, $Adres, $Postcode, $Gemeente, $Aktief);
        if ($registreer) {        
            klantService::mailPaswoord($Email, $Paswoord);
        }
        if (!$registreer) {
            $Paswoord = NULL;
            $error = "Uw Email staat al in het systeem";
        }
    } else {
        $error = "Gelieve alle velden in te vullen met een <em>*</em>";
    }
}

if (!isset($Paswoord)) {
?>
<div class="wrapper clearfix">
    <form action="?page=registreer" method="post">
        <input type="hidden" name="Aktief" value="1">
        <h1>Uw gegevens.</h1><h3><em><?php if (isset($error)) { print_r($error); } ?></em></h3>
        <dl>
            <dd><label for="Vnaam">Voornaam : </label><input type="text" name="Vnaam" placeholder="Joske" value="<?php if (isset($Vnaam)) { print($Vnaam); }?>"><em>*</em></dd>
            <dd><label for="Naam">Naam : </label><input type="text" name="Naam" placeholder="Vermeulen" value="<?php if (isset($Naam)) { print($Naam); }?>"><em>*</em></dd>
            <dd><label for="Adres">Adres : </label><input type="text" name="Adres" placeholder="Trammezandlei 122" value="<?php if (isset($Adres)) { print($Adres); }?>"><em>*</em></dd>
            <dd><label for="Postcode">Postcode / Gemeente : </label><input type="text" name="Postcode" placeholder="2900" size="4" value="<?php if (isset($Postcode)) { print($Postcode); }?>"><em>*</em>&nbsp;<input type="text" name="Gemeente" placeholder="Schoten" value="<?php if (isset($Gemeente)) { print($Gemeente); }?>"><em>*</em></dd>
            <dd><label for="Email">Email : </label><input type="email" name="Email" placeholder="joske@vermeulen.be" value="<?php if (isset($Email)) { print($Email); }?>"><em>*</em></dd>
<!--            <dd><label for="Paswoord1">Paswoord : </label><input type="password" name="Paswoord1" placeholder="******"><em>*</em></dd>
            <dd><label for="Paswoord2">Paswoord check : </label><input type="password" name="Paswoord2" placeholder="******"><em>*</em></dd>-->
            <dd class="txtC"><em> * Verplicht in te vullen gegevens.</em><br><button type="cancel" onclick="window.location='index.php?page=registreer';return false;">Maak leeg</button>&nbsp;&nbsp;<input type="submit" value="Registreer"></dd>
        </dl>
    </form>
</div>
<?php
}
if ($Paswoord) {
?>
<div class="wrapper clearfix txtC">
    <form action="?page=registreer" method="post">
        <input type="hidden" name="Aktief" value="1">
        <h1>Uw Login gegevens.</h1>
        <dl>
            <dd>Login : <?php if (isset($Email)) { print($Email); }?></dd>
            <dd>Paswoord : <?php if (isset($Paswoord)) { print($Paswoord); }?></dd>
        </dl>
        <a title="Log nu in" class="button" href="index.php?page=login">
            <span>Inloggen</span>
        </a>
    </form>
</div>
<?php
}
?>
