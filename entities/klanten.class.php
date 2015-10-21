<?php

class Klant {

    public $KlantID;
    public $Email;
    public $Paswoord;
    public $Naam;
    public $VNaam;
    public $Adres;
    public $Postcode;
    public $Gemeente;
    public $Aktief;

    public function __construct($KlantID, $Email, $Paswoord, $Naam, $VNaam, $Adres, $Postcode, $Gemeente, $Aktief) {
      $this->setKlantID($KlantID);
      $this->setEmail($Email);
      $this->setPaswoord($Paswoord);
      $this->setNaam($Naam);
      $this->setVNaam($VNaam);
      $this->setAdres($Adres);
      $this->setPostcode($Postcode);
      $this->setGemeente($Gemeente);
      $this->setAktief($Aktief);
    }

    public function setKlantID($KlantID) {
      $this->KlantID = $KlantID;
      return $this;
    }

    public function getKlantID() {
      return $this->KlantID;
    }

    public function setEmail($Email) {
      $this->Email = $Email;
      return $this;
    }

    public function getEmail() {
      return $this->Email;
    }

    public function setPaswoord($Paswoord) {
      $this->Paswoord = $Paswoord;
      return $this;
    }

    public function getPaswoord() {
      return $this->Paswoord;
    }

    public function setNaam($Naam) {
      $this->Naam = $Naam;
      return $this;
    }

    public function getNaam() {
      return $this->Naam;
    }

    public function setVNaam($VNaam) {
      $this->VNaam = $VNaam;
      return $this;
    }

    public function getVNaam() {
      return $this->VNaam;
    }

    public function setAdres($Adres) {
      $this->Adres = $Adres;
      return $this;
    }

    public function getAdres() {
      return $this->Adres;
    }

    public function setPostcode($Postcode) {
      $this->Postcode = $Postcode;
      return $this;
    }

    public function getPostcode() {
      return $this->Postcode;
    }

    public function setGemeente($Gemeente) {
      $this->Gemeente = $Gemeente;
      return $this;
    }

    public function getGemeente() {
      return $this->Gemeente;
    }

    public function setAktief($Aktief) {
      $this->Aktief = $Aktief;
      return $this;
    }

    public function getAktief() {
      return $this->Aktief;
    }

}
