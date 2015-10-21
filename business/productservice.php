<?php

require_once("data/productDAO.php");

class productService {

  public static function getAllCategories() {
      $arrCategorie = ProductDAO::getAllCategories();
      return $arrCategorie;
  }
  
  public static function getAllProducts() {
    $arrProducten = ProductDAO::getAllProducts();
    return $arrProducten;
  }
  
  public static function getProductFromId($id) {
    $arrProduct = ProductDAO::getProductFromId($id);
    return $arrProduct;
  }
  
}
