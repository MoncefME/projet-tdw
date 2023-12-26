<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/vehiculeReviewsController.php');
$vehiculeReviewId = isset($_POST['vehiculeReviewId']) ? $_POST['vehiculeReviewId'] : '';
$vehiculeReviewController = new VehiculeReviewsController();
$responce = $vehiculeReviewController->rejectVehiculeReview($vehiculeReviewId);
if ($responce) {
    echo 'Review rejected successfully';
} else {
    echo 'Error while rejecting review';
}
