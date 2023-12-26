<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeReviewsController.php");
$vehiculeId = isset($_GET['vehiculeId']) ? $_GET['vehiculeId'] : null;
$userId = isset($_SESSION['USER']['id']) ? $_SESSION['USER']['id'] : null;

$vehiculeReviewController = new VehiculeReviewsController();
$responce = $vehiculeReviewController->addVehiculeReview($vehiculeId, $userId);

header("Location: /CarLog/vehicule/?id=$vehiculeId");



