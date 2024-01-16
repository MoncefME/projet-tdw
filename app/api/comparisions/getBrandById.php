<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");
$brandId = $_POST['brandId'];

$brandController = new BrandController();
$brand = $brandController->getBrandById($brandId);

echo json_encode($brand);