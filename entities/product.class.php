<?php

class Product {
    public $id;
    public $categorie;
    public $product;
    public $prijs;

  public function __construct($id, $categorie, $product, $prijs) {
    $this->setId($id);
    $this->setCategorie($categorie);
    $this->setProduct($product);
    $this->setPrijs($prijs);
  }

  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  public function getId() {
    return $this->id;
  }

  public function setCategorie($categorie) {
    $this->categorie = $categorie;
    return $this;
  }

  public function getCategorie() {
    return $this->categorie;
  }

  public function setProduct($product) {
    $this->product = $product;
    return $this;
  }

  public function getProduct() {
    return $this->product;
  }

  public function setPrijs($prijs) {
    $this->prijs = $prijs;
    return $this;
  }

  public function getPrijs() {
    return $this->prijs;
  }

  }
