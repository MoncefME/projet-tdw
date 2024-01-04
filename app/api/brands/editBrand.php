<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/brandController.php');

$id = isset($_GET['brandId']) ? $_GET['brandId'] : null;

$brandController = new BrandController();
$responce = $brandController->updateBrand($id);

header("Location: /CarLog/admin/manageBrandsPage/");