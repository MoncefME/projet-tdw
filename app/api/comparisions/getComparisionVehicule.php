<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
$vehiculeController = new VehiculeController();
$brandId = $_POST['brandId'];
$model = $_POST['model'];
$year = $_POST['year'];
$vehicule = $vehiculeController->getVehiculeByBrandModelYear($brandId, $model, $year);
echo json_encode($vehicule);
