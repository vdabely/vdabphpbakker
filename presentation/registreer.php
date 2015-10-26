<?php 
function isPostSet($var) {
    if (isset($_POST[$var])) {
        return $_POST[$var];
    } else {
        return FALSE;
    }
}

$Vnaam = isPostSet('Vnaam');
$Naam = isPostSet("Naam");
$Adres = isPostSet("Adres");
$Postcode = isPostSet("Postcode");
$Gemeente = isPostSet("Gemeente");
$Email = isPostSet("Email");
$Paswoord1 = isPostSet("Paswoord1");
$Paswoord2 = isPostSet("Paswoord2");
$Aktief = isPostSet("Aktief");

if (isset($_POST['Aktief'])) {
    if ($Vnaam&&$Naam&&$Adres&&$Postcode&&$Gemeente&&$Email&&$Paswoord1&&$Paswoord2&&$Paswoord1==$Paswoord2) {
        $Paswoord = sha1($Paswoord1);
        $registreer = klantService::maakKlant($Email, $Paswoord, $Naam, $Vnaam, $Adres, $Postcode, $Gemeente, $Aktief);
        header('Location: index.php?page=login');
    } else {
        $error = "Gelieve alle velden in te vullen met een <em>*</em>";
    }
}
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
            <dd><label for="Paswoord1">Paswoord : </label><input type="password" name="Paswoord1" placeholder="******"><em>*</em></dd>
            <dd><label for="Paswoord2">Paswoord check : </label><input type="password" name="Paswoord2" placeholder="******"><em>*</em></dd>
            <dd class="txtC"><em> * Verplicht in te vullen gegevens.</em><br><button type="cancel" onclick="window.location='index.php?page=registreer';return false;">Maak leeg</button>&nbsp;&nbsp;<input type="submit" value="Registreer"></dd>
        </dl>
    </form>
</div>
