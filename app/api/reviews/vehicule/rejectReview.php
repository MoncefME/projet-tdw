<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/vehiculeReviewsController.php');

$vehiculeReviewId = isset($_POST['vehiculeReviewId']) ? $_POST['vehiculeReviewId'] : '';

$vehiculeReviewController = new VehiculeReviewsController();
$responce = $vehiculeReviewController->rejectVehiculeReview($vehiculeReviewId);

