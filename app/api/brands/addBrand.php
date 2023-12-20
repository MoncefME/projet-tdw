<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/brandController.php');

$brandController = new BrandController();
$responce = $brandController->addBrand();