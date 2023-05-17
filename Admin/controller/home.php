<?php
include_once 'model/connetion_user.php';
include_once 'model/catalog.php';
include_once 'model/product.php';

$products = getAllProduct();
include 'view/product/index.php';
?>