<?php

require_once("data/KlantenDAO.php");

class loginservice {
    
    public static function login($email, $paswoord) {
        $login = KlantenDAO::getKlantFromEmail($email);
        if ($login) {
            $DBpaswoord = $login->Paswoord;
            $klantID = $login->KlantID;
            $actief = $login->Aktief;
            if (isset($actief)&&!$actief) {
                return false;
                die();
            }
            if (sha1($paswoord)==$DBpaswoord&&$actief) {
                setcookie ("LoginC", $klantID, time() + 86400); // 60*60*24 = 86400 => 1 dag
                return true;
            }
        }
    }
    
}