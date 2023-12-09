<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/vehiculeReviewsModel.php');
class VehiculeReviewsController
{
    public function getVehiculeReviewById($vehiculeReviewId)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();
        $vehiculeReview = $vehiculeReviewModel->getVehiculeReviewById($vehiculeReviewId);
        return $vehiculeReview;
    }
    public function getAllVehiculeReviews()
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();
        $vehiculeReviews = $vehiculeReviewModel->getAllVehiculeReviews();
        return $vehiculeReviews;
    }
    public function getReviewsByVehicule($vehiculeId)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();
        $reviewsByVehicule = $vehiculeReviewModel->getReviewsByVehicule($vehiculeId);
        return $reviewsByVehicule;
    }
    public function addVehiculeReview()
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();

        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $vehicule_id = isset($_POST['vehicule_id']) ? $_POST['vehicule_id'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : 'PENDING';
        $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
        $rating = isset($_POST['rating']) ? $_POST['rating'] : '';

        $success = $vehiculeReviewModel->addVehiculeReview($user_id, $vehicule_id, $status, $comment, $rating);
        return $success;
    }
    public function updateVehiculeReview($vehiculeReviewId)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();

        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $vehicule_id = isset($_POST['vehicule_id']) ? $_POST['vehicule_id'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : 'PENDING';
        $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
        $rating = isset($_POST['rating']) ? $_POST['rating'] : '';

        $success = $vehiculeReviewModel->updateVehiculeReview($vehiculeReviewId, $user_id, $vehicule_id, $status, $comment, $rating);
        return $success;
    }
    public function deleteVehiculeReview($vehiculeReviewId)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();
        $success = $vehiculeReviewModel->deleteVehiculeReview($vehiculeReviewId);
        return $success;
    }
    public function validateVehiculeReview($vehiculeReviewId)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();
        $success = $vehiculeReviewModel->validateVehiculeReview($vehiculeReviewId);
        return $success;
    }
    public function rejectVehiculeReview($vehiculeReviewId)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();
        $success = $vehiculeReviewModel->rejectVehiculeReview($vehiculeReviewId);
        return $success;
    }
}
