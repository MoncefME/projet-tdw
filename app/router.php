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
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/singleBrandPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/userViews/singleVehiculePage.php");

/** Admin Pages */
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageBrandsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageNewsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageBReviewsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageVReviewsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageUsersPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/adminDashboardPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/manageVehiculesPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/settingsPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/editBrandPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/adminViews/editVehiculePage.php");

/** Shared Pages */
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/logInPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/signUpPage.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/pageNotFound.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/unAuthorizedPage.php");


$request = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
$request = strtok($request, '?');

$userRole = isset($_SESSION['USER']) ? $_SESSION['USER']['role'] : 'GUEST';


$view = null;

switch ($request) {
    case '/CarLog/':
        $view = new HomePage();
        break;
    case '/CarLog/homePage/':
        $view = new HomePage();
        break;
    case '/CarLog/guidePage/':
        $view = new GuidePage();
        break;
    case '/CarLog/contactPage/':
        $view = new ContactPage();
        break;
    case '/CarLog/brandsPage/':
        $view = new BrandsPage();
        break;
    case '/CarLog/brand/':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $view = new SingleBrandPage($id);
        } else {
            $view = new PageNotFound();
        }
        break;
    case '/CarLog/vehicule/':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $view = new SingleVehiculePage($id);
        } else {
            $view = new PageNotFound();
        }
        break;
    case '/CarLog/comparatorPage/':
        $view = new ComparatorPage();
        break;
    case '/CarLog/newsPage/':
        $view = new NewsPage();
        break;
    case '/CarLog/profilePage/':
        if ($userRole !== 'GUEST') {
            $view = new ProfilePage();
        } else {
            $view = new LogInPage();
        }
        break;
    case '/CarLog/reviewsPage/':
        $view = new ReviewsPage();
        break;

    case '/CarLog/admin/':
        if ($userRole === 'ADMIN') {
            $view = new AdminDashboardPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;
    case '/CarLog/admin/manageBrandsPage/':
        if ($userRole === 'ADMIN') {
            $view = new ManageBrandsPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;
    case '/CarLog/admin/brand/':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $view = new EditBrandPage($id);
        } else {
            $view = new PageNotFound();
        }
        break;
    case '/CarLog/admin/manageVehiculesPage/':
        if ($userRole === 'ADMIN') {
            $view = new ManageVehiculesPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;
    case "/CarLog/admin/vehicule/":
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $view = new EditVehiculePage($id);
        } else {
            $view = new PageNotFound();
        }
        break;
    case '/CarLog/admin/manageNewsPage/':
        if ($userRole === 'ADMIN') {
            $view = new ManageNewsPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;
    case '/CarLog/admin/manageUsersPage/':
        if ($userRole === 'ADMIN') {
            $view = new ManageUsersPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;
    case '/CarLog/admin/manageBrandsReviewsPage/':
        if ($userRole === 'ADMIN') {
            $view = new ManageBReviewsPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;
    case '/CarLog/admin/manageVehiculesReviewsPage/':
        if ($userRole === 'ADMIN') {
            $view = new ManageVReviewsPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;
    case '/CarLog/admin/settings/':
        if ($userRole === 'ADMIN') {
            $view = new SettingsPage();
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
