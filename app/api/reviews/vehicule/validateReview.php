<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/vehiculeReviewsController.php');

if ($_SERVER['USER']['role'] != 'admin') {
    $vehiculeReviewId = isset($_POST['vehiculeReviewId']) ? $_POST['vehiculeReviewId'] : '';
    $vehiculeReviewController = new VehiculeReviewsController();
    $responce = $vehiculeReviewController->validateVehiculeReview($vehiculeReviewId);
} else {
    echo "You are not authorized to perform this action";
}
