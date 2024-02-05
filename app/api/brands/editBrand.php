<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/brandController.php');

if ($_SERVER['USER']['role'] != 'admin') {
    $id = isset($_GET['brandId']) ? $_GET['brandId'] : null;
    $brandController = new BrandController();
    $responce = $brandController->updateBrand($id);
} else {
    echo "You are not authorized to perform this action";
}

header("Location: /CarLog/admin/manageBrandsPage/");
