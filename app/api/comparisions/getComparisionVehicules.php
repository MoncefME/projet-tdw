<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");

$vehiculeController = new VehiculeController();

$vehicule1Id = $_POST['vehicule1Id'] ?? null;
$vehicule1 = $vehicule1Id ? $vehiculeController->getVehiculeById($vehicule1Id) : null;

$vehicule2Id = $_POST['vehicule2Id'] ?? null;
$vehicule2 = $vehicule2Id ? $vehiculeController->getVehiculeById($vehicule2Id) : null;

$vehicule3Id = $_POST['vehicule3Id'] ?? null;
$vehicule3 = $vehicule3Id ? $vehiculeController->getVehiculeById($vehicule3Id) : null;

$vehicule4Id = $_POST['vehicule4Id'] ?? null;
$vehicule4 = $vehicule4Id ? $vehiculeController->getVehiculeById($vehicule4Id) : null;

$vehiculesIds = [$vehicule1Id, $vehicule2Id, $vehicule3Id, $vehicule4Id];

$vehicles = array_filter($vehiculesIds);

if (count($vehicles) == 0 || count($vehicles) == 1) {
    echo json_encode(['error' => 'Select at least two distinct vehicules']);
    return;
} else {
    $uniqueVehiculesIds = array_unique($vehicles);
    if (count($uniqueVehiculesIds) < count($vehicles)) {
        echo json_encode(['error' => 'Vehicules must be unique']);
        return;
    } else {
        echo json_encode([$vehicule1, $vehicule2, $vehicule3, $vehicule4]);
        return;
    }
}


