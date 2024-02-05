<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/brandController.php');
if ($_SERVER['USER']['role'] != 'admin') {
    $brandController = new BrandController();
    $responce = $brandController->addBrand();
} else {
    echo "You are not authorized to perform this action";
}
header("Location: /CarLog/admin/manageBrandsPage/");
