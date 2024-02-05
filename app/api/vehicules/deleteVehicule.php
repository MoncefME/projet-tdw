<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/vehiculeController.php');

if ($_SERVER['USER']['role'] == 'admin') {
    $id = isset($_POST['vehiculeId']) ? $_POST['vehiculeId'] : null;
    $vehiculeController = new VehiculeController();
    $response = $vehiculeController->deleteVehicule($id);
    header("Location: /CarLog/admin/manageVehiculesPage/");
} else {
    echo "You are not authorized to perform this action";
}
