<?php

require_once("dbconfig.class.php");
require_once("entities/product.class.php");

class ProductDAO {
       
    public static function getAllCategories() {
        $sql = "select Categorie from producten group by Categorie";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $result = $dbh->query($sql);
        $arrCategories = array();
        foreach ($result as $rij) {
            $categorie = $rij["Categorie"];
            array_push($arrCategories, $categorie);
        }
        $dbh = null;
        return $arrCategories;
    }

    public static function getAllProducts() {
        $sql = "select * from producten";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $result = $dbh->query($sql);
        $arrProducten = array();
        foreach ($result as $rij) {
            $product = new Product($rij['ProductID'], $rij["Categorie"], $rij["Product"], $rij["Prijs"]);
            array_push($arrProducten, $product);
        }
        $dbh = null;
        return $arrProducten;
      }

      public static function getProductFromId($id) {
        $sql = "select * from producten where ProductID=".$id;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $result = $dbh->query($sql);
        foreach ($result as $rij) {
            $product = new Product($rij['ProductID'], $rij["Categorie"], $rij["Product"], $rij["Prijs"]);
        }
        $dbh = null;
        if (isset($product)) {
            return $product;
        }
      }

  }
