<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/databaseController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/Config/queries/reviewQueries.php");
class BrandReviewsModel
{

    public function getBrandReviewById($brandReviewId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::getBrandReviewById();
        $params = [$brandReviewId];
        $brandReview = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $brandReview;
    }
    public function getAllBrandReviews()
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::getAllBrandReviews();
        $brandReviews = $dbController->request($database, $query);

        $dbController->disConnect($database);
        return $brandReviews;
    }
    public function getReviewsByBrand($brandId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::getReviewsByBrand();
        $params = [$brandId];
        $reviewsByBrand = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $reviewsByBrand;
    }
    public function addBrandReview($user_id, $brand_id, $status, $comment, $rating)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::addBrandReview();
        $params = [$user_id, $brand_id, $status, $comment, $rating];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function updateBrandReview($brandReviewId, $user_id, $brand_id, $status, $comment, $rating)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::updateBrandReview();
        $params = [$user_id, $brand_id, $status, $comment, $rating, $brandReviewId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function deleteBrandReview($brandReviewId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::deleteBrandReview();
        $params = [$brandReviewId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function validateBrandReview($brandReviewId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::validateBrandReview();
        $params = [$brandReviewId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function rejectBrandReview($brandReviewId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ReviewQueries::rejectBrandReview();
        $params = [$brandReviewId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
}
