<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/brandReviewsController.php');

if ($_SERVER['USER']['role'] == 'admin') {
    $brandReviewId = isset($_POST['brandReviewId']) ? $_POST['brandReviewId'] : '';
    $brandReviewController = new BrandReviewsController();
    $responce = $brandReviewController->rejectBrandReview($brandReviewId);
} else {
    echo "You are not authorized to perform this action";
}
