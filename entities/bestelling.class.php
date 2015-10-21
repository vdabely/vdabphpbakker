<?php

class Bestel {

    public $BestelID;
    public $KlantID;
    public $Besteldatum;

    public function __construct($KlantID, $BestelID, $Besteldatum, $Prijs) {
      $this->setKlantID($KlantID);
      $this->setBestelID($BestelID);
      $this->setBesteldatum($Besteldatum);
      $this->setPrijs($Prijs);
    }

    public function setBestelID($BestelID) {
      $this->BestelID = $BestelID;
      return $this;
    }

    public function getBestelID() {
      return $this->BestelID;
    }

    public function setKlantID($KlantID) {
      $this->KlantID = $KlantID;
      return $this;
    }

    public function getKlantID() {
      return $this->KlantID;
    }

    public function setBesteldatum($Besteldatum) {
      $this->Besteldatum = $Besteldatum;
      return $this;
    }

    public function getBesteldatum() {
      return $this->Besteldatum;
    }

    public function setPrijs($Prijs) {
      $this->Prijs = $Prijs;
      return $this;
    }

    public function getPrijs() {
      return $this->Prijs;
    }

}
