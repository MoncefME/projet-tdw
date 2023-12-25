<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/vehiculeController.php');
$id = isset($_GET['vehiculeId']) ? $_GET['vehiculeId'] : null;
$vehiculeController = new VehiculeController();
$responce = $vehiculeController->updateVehicule($id);

header("Location: /CarLog/admin/manageVehiculesPage/");