<?php

require_once("data/klantenDAO.php");

class loginservice {
    
    public static function login($email, $paswoord) {
        $login = KlantenDAO::getKlantFromEmail($email);
        if ($login) {
            $DBpaswoord = $login->Paswoord;
            $klantID = $login->KlantID;
            if (sha1($paswoord)==$DBpaswoord) {
                setcookie ("LoginC", $email, time() + (10 * 365 * 24 * 60 * 60)); // 10 jaar geldig
                $_SESSION["LoginC"] = $klantID;
                return $login;
            }
        }
    }
    public function logout() {
        session_destroy();
    }
    
}