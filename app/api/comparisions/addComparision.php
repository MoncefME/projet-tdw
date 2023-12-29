<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/comparisionController.php");
$comparisionController = new ComparisionController();

$vehicule1Id = $_POST['vehicule1Id'] ?? null;
$vehicule2Id = $_POST['vehicule2Id'] ?? null;
$vehicule3Id = $_POST['vehicule3Id'] ?? null;
$vehicule4Id = $_POST['vehicule4Id'] ?? null;


$vehicules = [$vehicule1Id, $vehicule2Id, $vehicule3Id, $vehicule4Id];
sort($vehicules);

$userId = $_SESSION['USER']['id'];

$responce = $comparisionController->addComparison($userId, $vehicules[0], $vehicules[1], $vehicules[2], $vehicules[3]);
echo json_encode($responce);
