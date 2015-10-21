<?php

require_once("business/productservice.php");
require_once("business/klantenservice.php");
require_once("business/bestellingservice.php");
require_once("business/bestelservice.php");
require_once("business/loginservice.php");

session_start();
if(!isset($_SESSION['bestelregelarray'])) {
    $_SESSION['bestelregelarray'] = array();
}

// MAAK PRODUCTLIJST AAN
$arrCategories = productService::getAllCategories();
$arrProducten = productService::getAllProducts();
// MAAK WINKELKAR AAN

include 'presentation/homepage.php';

?>