<?php
session_start();
/** User Pages */
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/brandsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/comparatorPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/contactPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/guidePage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/homePage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/newsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/profilePage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/reviewsPage.php");

/** Admin Pages */
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageBrandsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageNewsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageBReviewsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageVReviewsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageUsersPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/adminDashboardPage.php");

/** Shared Pages */
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/logInPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/signUpPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/pageNotFound.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/unAuthorizedPage.php");

$request = rtrim($_SERVER['REQUEST_URI'], '/') . '/';

$userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : 'admin';


$view = null;

switch ($request) {

    case '/CarLog/':
        $view = new HomePage();
        break;
    case '/CarLog/homePage/':
        $view = new HomePage();
        break;
    case '/CarLog/contactPage/':
        $view = new ContactPage();
        break;
    case '/CarLog/brandsPage/':
        $view = new BrandsPage();
        break;
    case '/CarLog/comparatorPage/':
        $view = new ComparatorPage();
        break;
    case '/CarLog/newsPage/':
        $view = new NewsPage();
        break;
    case '/CarLog/profilePage/':
        if ($userRole !== 'guest') {
            $view = new ProfilePage();
        } else {
            $view = new LogInPage();
        }
        break;
    case '/CarLog/reviewsPage/':
        $view = new ReviewsPage();
        break;

    case '/CarLog/admin/':
        if ($userRole === 'admin') {
            $view = new AdminDashboardPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;
    case '/CarLog/admin/manageBrandsPage/':
        if ($userRole === 'admin') {
            $view = new ManageBrandsPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;
    case '/CarLog/admin/manageNewsPage/':
        if ($userRole === 'admin') {
            $view = new ManageNewsPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;
    case '/CarLog/admin/manageUsersPage/':
        if ($userRole === 'admin') {
            $view = new ManageUsersPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;
    case '/CarLog/admin/manageBrandsReviewsPage/':
        if ($userRole === 'admin') {
            $view = new ManageBReviewsPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;
    case '/CarLog/admin/manageVehiculesReviewsPage/':
        if ($userRole === 'admin') {
            $view = new ManageVReviewsPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;

    case '/CarLog/loginPage/':
        $view = new LogInPage();
        break;
    case '/CarLog/signUpPage/':
        $view = new SignUpPage();
        break;
    default:
        $view = new PageNotFound();
}

$view->showPage();
