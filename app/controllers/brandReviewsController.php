<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/brandReviewsModel.php');
class BrandReviewsController
{
    public function getBrandReviewById($brandReviewId)
    {
        $brandReviewModel = new BrandReviewsModel();
        return $brandReviewModel->getBrandReviewById($brandReviewId);
    }
    public function getAllBrandReviews()
    {
        $brandReviewModel = new BrandReviewsModel();
        return $brandReviewModel->getAllBrandReviews();
    }
    public function getReviewsByBrand($brandId)
    {
        $brandReviewModel = new BrandReviewsModel();
        return $brandReviewModel->getReviewsByBrand($brandId);
    }
    public function getValidReviewsByBrand($brandId)
    {
        $brandReviewModel = new BrandReviewsModel();
        return $brandReviewModel->getValidReviewsByBrand($brandId);
    }
    public function addBrandReview($brand_id, $user_id)
    {
        $brandReviewModel = new BrandReviewsModel();

        $status = 'PENDING';
        $comment = FormValidation::validateInput('comment');
        $rating = FormValidation::validateInput('rating');

        $success = $brandReviewModel->addBrandReview($user_id, $brand_id, $status, $comment, $rating);
        if ($success) {
            $_SESSION['REVIEW-MESSAGE'] = 'Review added successfully. Wait until the admin approves your review.';
        } else {
            $_SESSION['REVIEW-MESSAGE'] = 'Error while adding review';
        }
        return $success;
    }
    public function updateBrandReview($brandReviewId)
    {
        $brandReviewModel = new BrandReviewsModel();

        $user_id = FormValidation::validateInput('user_id');
        $brand_id = FormValidation::validateInput('brand_id');
        $status = FormValidation::validateInput('status');
        $comment = FormValidation::validateInput('comment');
        $rating = FormValidation::validateInput('rating');

        return $brandReviewModel->updateBrandReview($brandReviewId, $user_id, $brand_id, $status, $comment, $rating);

    }
    public function deleteBrandReview($brandReviewId)
    {
        $brandReviewModel = new BrandReviewsModel();
        return $brandReviewModel->deleteBrandReview($brandReviewId);
    }
    public function validateBrandReview($brandReviewId)
    {
        $brandReviewModel = new BrandReviewsModel();
        return $brandReviewModel->validateBrandReview($brandReviewId);
    }
    public function rejectBrandReview($brandReviewId)
    {
        $brandReviewModel = new BrandReviewsModel();
        return $brandReviewModel->rejectBrandReview($brandReviewId);
    }
}
