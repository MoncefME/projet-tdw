<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/databaseController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/Config/queries/reviewQueries.php");
class VehiculeReviewsModel
{
    public function getVehiculeReviewById($vehiculeReviewId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::getVehiculeReviewById();
        $params = [$vehiculeReviewId];
        $vehiculeReview = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $vehiculeReview;
    }
    public function getAllVehiculeReviews()
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::getAllVehiculeReviews();
        $vehiculeReviews = $dbController->request($database, $query);

        $dbController->disConnect($database);
        return $vehiculeReviews;
    }
    public function getReviewsByVehicule($vehiculeId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::getReviewsByVehicule();
        $params = [$vehiculeId];
        $reviewsByVehicule = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $reviewsByVehicule;
    }
    public function addVehiculeReview($user_id, $vehicule_id, $status, $comment, $rating)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::addVehiculeReview();
        $params = [$user_id, $vehicule_id, $status, $comment, $rating];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function updateVehiculeReview($vehiculeReviewId, $user_id, $vehicule_id, $status, $comment, $rating)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::updateVehiculeReview();
        $params = [$user_id, $vehicule_id, $status, $comment, $rating, $vehiculeReviewId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function deleteVehiculeReview($vehiculeReviewId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::deleteVehiculeReview();
        $params = [$vehiculeReviewId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function validateVehiculeReview($vehiculeReviewId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::validateVehiculeReview();
        $params = [$vehiculeReviewId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function rejectVehiculeReview($vehiculeReviewId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::rejectVehiculeReview();
        $params = [$vehiculeReviewId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
}
