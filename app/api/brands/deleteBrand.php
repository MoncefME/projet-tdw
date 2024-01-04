<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/brandController.php');

$id = isset($_POST['brandId']) ? $_POST['brandId'] : null;
$brandController = new BrandController();

$response = $brandController->deleteBrand($id);
