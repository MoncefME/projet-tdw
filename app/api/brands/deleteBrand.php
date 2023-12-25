<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/brandController.php');
$id = isset($_POST['brandId']) ? $_POST['brandId'] : null;
$brandController = new BrandController();
$response = $brandController->deleteBrand($id);
if ($response) {
    echo 'Brand deleted';
} else {
    echo 'Error while deleting BRand';
}