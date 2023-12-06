<?php
echo "hello world!";
// Import admin Pages
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageBrandsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageNewsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageReviewsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/mnanageUsersPage.php");


// get the current request
$request = $_SERVER['REQUEST_URI'];
