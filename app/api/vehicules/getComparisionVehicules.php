<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/comparisionController.php");
$vehiculeController = new VehiculeController();
$comparisionController = new ComparisionController();

$vehicule1Id = isset($_POST['vehicule1Id']) ? $_POST['vehicule1Id'] : null;
$vehicule1 = $vehicule1Id ? $vehiculeController->getVehiculeById($vehicule1Id) : null;

$vehicule2Id = isset($_POST['vehicule2Id']) ? $_POST['vehicule2Id'] : null;
$vehicule2 = $vehicule2Id ? $vehiculeController->getVehiculeById($vehicule2Id) : null;

$vehicule3Id = isset($_POST['vehicule3Id']) ? $_POST['vehicule3Id'] : null;
$vehicule3 = $vehicule3Id ? $vehiculeController->getVehiculeById($vehicule3Id) : null;

$vehicule4Id = isset($_POST['vehicule4Id']) ? $_POST['vehicule4Id'] : null;
$vehicule4 = $vehicule4Id ? $vehiculeController->getVehiculeById($vehicule4Id) : null;

$vehicles = array_filter([$vehicule1, $vehicule2, $vehicule3, $vehicule4], function ($vehicle) {
    return $vehicle !== null;
});

$userId = $_SESSION['USER']['id'];

echo json_encode($vehicles);
