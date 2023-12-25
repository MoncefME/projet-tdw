<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/vehiculeController.php');
$id = isset($_POST['vehiculeId']) ? $_POST['vehiculeId'] : null;
$vehiculeController = new VehiculeController();
$response = $vehiculeController->deleteVehicule($id);
if ($response) {
    echo 'Vehicule  deleted';
} else {
    echo 'Error while deleting Vehicule';
}