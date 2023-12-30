<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/vehiculeReviewsModel.php');
class VehiculeReviewsController
{
    public function getVehiculeReviewById($vehiculeReviewId)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();
        return $vehiculeReviewModel->getVehiculeReviewById($vehiculeReviewId);
    }
    public function getAllVehiculeReviews()
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();
        return $vehiculeReviewModel->getAllVehiculeReviews();
    }
    public function getValidReviewsByVehicule($vehiculeId)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();
        return $vehiculeReviewModel->getValidReviewsByVehicule($vehiculeId);
    }
    public function getReviewsByVehicule($vehiculeId)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();
        $reviewsByVehicule = $vehiculeReviewModel->getReviewsByVehicule($vehiculeId);
        return $reviewsByVehicule;
    }
    public function addVehiculeReview($vehicule_id, $user_id)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();

        $status = 'PENDING';
        $comment = FormValidation::validateInput('comment');
        $rating = FormValidation::validateInput('rating');

        $success = $vehiculeReviewModel->addVehiculeReview($user_id, $vehicule_id, $status, $comment, $rating);
        if ($success) {
            $_SESSION['REVIEW-MESSAGE'] = 'Review added successfully. Wait until the admin approves your review.';
        } else {
            $_SESSION['REVIEW-MESSAGE'] = 'Error while adding review';
        }
        return $success;
    }
    public function updateVehiculeReview($vehiculeReviewId)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();

        $user_id = FormValidation::validateInput('user_id');
        $vehicule_id = FormValidation::validateInput('vehicule_id');
        $status = isset($_POST['status']) ? $_POST['status'] : 'PENDING';
        $comment = FormValidation::validateInput('comment');
        $rating = FormValidation::validateInput('rating');

        return $vehiculeReviewModel->updateVehiculeReview($vehiculeReviewId, $user_id, $vehicule_id, $status, $comment, $rating);
    }
    public function deleteVehiculeReview($vehiculeReviewId)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();
        return $vehiculeReviewModel->deleteVehiculeReview($vehiculeReviewId);
    }
    public function validateVehiculeReview($vehiculeReviewId)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();
        return $vehiculeReviewModel->validateVehiculeReview($vehiculeReviewId);
    }
    public function rejectVehiculeReview($vehiculeReviewId)
    {
        $vehiculeReviewModel = new VehiculeReviewsModel();
        return $vehiculeReviewModel->rejectVehiculeReview($vehiculeReviewId);
    }
}
