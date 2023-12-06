<?php
echo "hello world!";
// Import user Pages
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/brandsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/comparatorPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/contactPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/guidePage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/homePage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/loginPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/newsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/profilePage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/reviewsPage.php");

// get the current request
$request = $_SERVER['REQUEST_URI'];
