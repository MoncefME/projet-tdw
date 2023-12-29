<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/comparisionController.php");
$comparisionController = new ComparisionController();

$vehicule1Id = isset($_POST['vehicule1Id']) ? $_POST['vehicule1Id'] : null;
$vehicule2Id = isset($_POST['vehicule2Id']) ? $_POST['vehicule2Id'] : null;
$vehicule3Id = isset($_POST['vehicule3Id']) ? $_POST['vehicule3Id'] : null;
$vehicule4Id = isset($_POST['vehicule4Id']) ? $_POST['vehicule4Id'] : null;
$userId = $_SESSION['USER']['id'];

$responce = $comparisionController->addComparison($userId, $vehicule1Id, $vehicule2Id, $vehicule3Id, $vehicule4Id);
echo json_encode($responce);
