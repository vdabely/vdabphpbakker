<?php

require_once("data/klantenDAO.php");

class klantService {

    public static function getAllKlanten() {
        $arrAlleklanten = KlantenDAO::getAllKlanten();
        return $arrAlleklanten;
    }

    public static function getKlantFromId($id) {
        $objKlant = KlantenDAO::getKlantFromId($id);
        return $objKlant;
    }

    public static function getKlantFromEmail($email) {
        $objKlant = KlantenDAO::getKlantFromEmail($email);
        return $objKlant;
    }
    
    public function maakKlant($Email, $Paswoord, $Naam, $Vnaam, $Adres, $Postcode, $Gemeente, $Aktief) {
        $objKlant = KlantenDAO::createKlant($Email, $Paswoord, $Naam, $Vnaam, $Adres, $Postcode, $Gemeente, $Aktief);
        return $objKlant;
    }
    
    public function isPostSet($var) {
        if (isset($_POST[$var])) {
            return $_POST[$var];
        } else {
            return FALSE;
        }
    }
    
    public function klantAktief($KlantID) {
        $klantActief = klantService::getKlantFromId($KlantID);
        $aktief = $klantActief->Aktief;
        if ($aktief) {
            KlantenDAO::klantDesAktief($KlantID);
        }
        if (!$aktief) {
            KlantenDAO::klantAktief($KlantID);
        }
    }
    
    public function mailPaswoord($email, $paswoord) {
        $subject = 'Uw Paswoord voor Lokale Bakker';
        $message = '
        <html>
        <head>
          <title>Lokale Bakker</title>
        </head>
        <body>
        <h1>Uw Login gegevens.</h1>
        <dl>
            <dd>Login : '.$email.'</dd>
            <dd>Paswoord : '.$paswoord.'</dd>
        </dl>
        <a title="Log nu in" class="button" href="http://localhost/Bakker/index.php?page=login">
            <span>Inloggen</span>
        </a>
        </body>
        </html>
        ';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <warmebakker@scoofy.be>' . "\r\n";

        mail($email,$subject,$message,$headers);
    }


}
