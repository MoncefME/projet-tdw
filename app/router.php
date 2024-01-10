<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/config/config.php");
/** Utils */
require_once(APIROUTER_PATH);
require_once(IMAGE_UTILITY_PATH);
require_once(FORM_VALIDATION_PATH);

/** User Pages */
require_once(BRANDS_PAGE_PATH);
require_once(COMPARATOR_PAGE_PATH);
require_once(CONTACT_PAGE_PATH);
require_once(GUIDE_PAGE_PATH);
require_once(HOME_PAGE_PATH);
require_once(NEWS_PAGE_PATH);
require_once(PROFILE_PAGE_PATH);
require_once(REVIEWS_PAGE_PATH);
require_once(SINGLE_BRAND_PAGE_PATH);
require_once(SINGLE_VEHICLE_PAGE_PATH);
require_once(SINGLE_NEWS_PAGE_PATH);
require_once(SINGLE_COMPARISON_PAGE_PATH);

/** Admin Pages */
require_once(MANAGE_BRANDS_PAGE_PATH);
require_once(MANAGE_NEWS_PAGE_PATH);
require_once(MANAGE_REVIEWS_PAGE_PATH);
require_once(MANAGE_BREVIEWS_PAGE_PATH);
require_once(MANAGE_VREVIEWS_PAGE_PATH);
require_once(MANAGE_USERS_PAGE_PATH);
require_once(ADMIN_DASHBOARD_PAGE_PATH);
require_once(MANAGE_VEHICLES_PAGE_PATH);
require_once(SETTINGS_PAGE_PATH);
require_once(EDIT_BRAND_PAGE_PATH);
require_once(EDIT_VEHICLE_PAGE_PATH);
require_once(EDIT_NEWS_PAGE_PATH);

/** Auth Pages */
require_once(LOGIN_PAGE_PATH);
require_once(SIGNUP_PAGE_PATH);

/** Error Pages */  
require_once(PAGE_NOT_FOUND_PATH);
require_once(UNAUTHORIZED_PAGE_PATH);

/** Controllers */
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
    case '/CarLog/comparision/':
        if (isset($_GET['idA']) || isset($_GET['idB'])) {
            $vehiculeA = $_GET['idA'];
            $vehiculeB = $_GET['idB'];
            $view = new SingleComparisionPage($vehiculeA, $vehiculeB);
        } else {
            $view = new PageNotFound();
        }
        break;
    case '/CarLog/newsPage/':
        $view = new NewsPage();
        break;
    case '/CarLog/news/':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $view = new SingleNewsPage($id);
        } else {
            $view = new PageNotFound();
        }
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
        if (isset($_GET['brandId'])) {
            $id = $_GET['brandId'];
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
        if (isset($_GET['vehiculeId'])) {
            $id = $_GET['vehiculeId'];
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
    case '/CarLog/admin/news/':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $view = new EditNewsPage($id);
        } else {
            $view = new PageNotFound();
        }
        break;
    case '/CarLog/admin/manageUsersPage/':
        if ($userRole === 'ADMIN') {
            $view = new ManageUsersPage();
        } else {
            $view = new UnAuthorizedPage();
        }
        break;
    case '/CarLog/admin/manageReviewsPage/':
        if ($userRole === 'ADMIN') {
            $view = new ManageReviewsPage();
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
