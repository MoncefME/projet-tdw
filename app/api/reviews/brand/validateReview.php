<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/brandReviewsController.php');
$brandReviewId = isset($_POST['brandReviewId']) ? $_POST['brandReviewId'] : '';
$brandReviewController = new BrandReviewsController();
$responce = $brandReviewController->validateBrandReview($brandReviewId);
if ($responce) {
    echo 'Review validated successfully';
} else {
    echo 'Error while validating review';
}