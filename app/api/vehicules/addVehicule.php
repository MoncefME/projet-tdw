<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/vehiculeController.php');

$vehiculeController = new VehiculeController();
$responce = $vehiculeController->addVehicule();

header("Location: /CarLog/admin/manageVehiculesPage/");

