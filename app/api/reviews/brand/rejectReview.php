<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/brandReviewsController.php');
$brandReviewId = isset($_POST['brandReviewId']) ? $_POST['brandReviewId'] : '';
$brandReviewController = new BrandReviewsController();
$responce = $brandReviewController->rejectBrandReview($brandReviewId);
if ($responce) {
    echo 'Review rejected successfully';
} else {
    echo 'Error while rejecting review';
}
