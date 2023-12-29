<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");

$brandId = $_POST['brandId'];
$vehiculeController = new VehiculeController();
$brandVehicules = $vehiculeController->getVehiculesByBrand($brandId);

echo json_encode($brandVehicules);
