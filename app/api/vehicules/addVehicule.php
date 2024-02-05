<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/vehiculeController.php');

if ($_SERVER['USER']['role'] == 'admin') {
    $vehiculeController = new VehiculeController();
    $responce = $vehiculeController->addVehicule();
    header("Location: /CarLog/admin/manageVehiculesPage/");
} else {
    echo "You are not authorized to perform this action";
}
