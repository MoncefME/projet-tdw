<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/brandReviewsModel.php');
class BrandReviewsController
{
    public function getBrandReviewById($brandReviewId)
    {
        $brandReviewModel = new BrandReviewsModel();
        $brandReview = $brandReviewModel->getBrandReviewById($brandReviewId);
        return $brandReview;
    }
    public function getAllBrandReviews()
    {
        $brandReviewModel = new BrandReviewsModel();
        $brandReviews = $brandReviewModel->getAllBrandReviews();
        return $brandReviews;
    }
    public function getReviewsByBrand($brandId)
    {
        $brandReviewModel = new BrandReviewsModel();
        $reviewsByBrand = $brandReviewModel->getReviewsByBrand($brandId);
        return $reviewsByBrand;
    }
    public function addBrandReview()
    {
        $brandReviewModel = new BrandReviewsModel();

        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $brand_id = isset($_POST['brand_id']) ? $_POST['brand_id'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
        $rating = isset($_POST['rating']) ? $_POST['rating'] : '';

        $success = $brandReviewModel->addBrandReview($user_id, $brand_id, $status, $comment, $rating);
        return $success;
    }
    public function updateBrandReview($brandReviewId)
    {
        $brandReviewModel = new BrandReviewsModel();

        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $brand_id = isset($_POST['brand_id']) ? $_POST['brand_id'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
        $rating = isset($_POST['rating']) ? $_POST['rating'] : '';

        $success = $brandReviewModel->updateBrandReview($brandReviewId, $user_id, $brand_id, $status, $comment, $rating);
        return $success;
    }
    public function deleteBrandReview($brandReviewId)
    {
        $brandReviewModel = new BrandReviewsModel();
        $success = $brandReviewModel->deleteBrandReview($brandReviewId);
        return $success;
    }
    public function validateBrandReview($brandReviewId)
    {
        $brandReviewModel = new BrandReviewsModel();
        $success = $brandReviewModel->validateBrandReview($brandReviewId);
        return $success;
    }
    public function rejectBrandReview($brandReviewId)
    {
        $brandReviewModel = new BrandReviewsModel();
        $success = $brandReviewModel->rejectBrandReview($brandReviewId);
        return $success;
    }
}
