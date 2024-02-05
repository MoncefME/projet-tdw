<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/brandController.php');

if ($_SERVER['USER']['role'] == 'admin') {
    $id = isset($_POST['brandId']) ? $_POST['brandId'] : null;
    $brandController = new BrandController();
    $response = $brandController->deleteBrand($id);
} else {
    echo "You are not authorized to perform this action";
}

header("Location: /CarLog/admin/manageBrandsPage/");
