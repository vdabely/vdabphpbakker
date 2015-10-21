<?php

class Bestelregel {

    public $productID;
    public $aantal;

    public function __construct($productID, $aantal) {
      $this->setProductID($productID);
      $this->setAantal($aantal);
    }

    public function setProductID($productID) {
      $this->productID = $productID;
      return $this;
    }

    public function getProductID() {
      return $this->productID;
    }

    public function setAantal($aantal) {
      $this->aantal = $aantal;
      return $this;
    }

    public function getAantal() {
      return $this->aantal;
    }

    public function setPrijs($prijs) {
      $this->prijs = $prijs;
      return $this;
    }

    public function getPrijs() {
      return $this->prijs;
    }

}