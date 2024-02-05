<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/vehiculeController.php');

if ($_SERVER['USER']['role'] == 'admin') {
    $id = isset($_GET['vehiculeId']) ? $_GET['vehiculeId'] : null;
    $vehiculeController = new VehiculeController();
    $responce = $vehiculeController->updateVehicule($id);
    header("Location: /CarLog/admin/manageVehiculesPage/");
} else {
    echo "You are not authorized to perform this action";
}
