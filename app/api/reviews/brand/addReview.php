<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandReviewsController.php");
$brandId = isset($_GET['brandId']) ? $_GET['brandId'] : null;
$userId = isset($_SESSION['USER']['id']) ? $_SESSION['USER']['id'] : null;


$brandReviewController = new BrandReviewsController();
$responce = $brandReviewController->addBrandReview($brandId, $userId);

header("Location: /CarLog/brand/?id=$brandId");



