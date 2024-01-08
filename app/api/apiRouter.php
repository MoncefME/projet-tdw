<?php
class ApiRouter
{
    /* ENDPOINTS */
    /*************AUTH*************/
    const LOGIN_ENDPOINT = API_BASE_URL . '/auth/login.php';
    const SIGNUP_ENDPOINT = API_BASE_URL . '/auth/signup.php';
    const LOGOUT_ENDPOINT = API_BASE_URL . '/auth/logout.php';

    /*************BRANDS*************/
    public static function EDIT_BRAND_ENDPOINT($brandId)
    {
        return API_BASE_URL . '/brands/editBrand.php?brandId=' . $brandId;
    }
    public static function DELETE_BRAND_ENDPOINT($brandId)
    {
        return API_BASE_URL . '/brands/deleteBrand.php?brandId=' . $brandId;
    }

    const ADD_BRAND_ENDPOINT = API_BASE_URL . '/brands/addBrand.php';


    /*************VEHICULES*************/
    public static function EDIT_VEHICULE_ENDPOINT($vehiculeId)
    {
        return API_BASE_URL . '/vehicules/editVehicule.php?vehiculeId=' . $vehiculeId;
    }
    public static function DELETE_VEHICULE_ENDPOINT($vehiculeId)
    {
        return API_BASE_URL . '/vehicules/deleteVehicule.php?vehiculeId=' . $vehiculeId;
    }

    const ADD_VEHICULE_ENDPOINT = API_BASE_URL . '/vehicules/addVehicule.php';

    /*************COMPARISIONS*************/
    const ADD_COMPARISION_ENDPOINT = API_BASE_URL . '/comparisions/addComparision.php';
    public static function GET_BRAND_ENDPOINT($brandId)
    {
        return API_BASE_URL . '/comparisions/getBrandById.php?brandId=' . $brandId;
    }
    public static function GET_BRAND_VEHICULES_ENDPOINT($brandId)
    {
        return API_BASE_URL . '/comparisions/getBrandVehicules.php?brandId=' . $brandId;
    }
    const GET_COMPARISION_VEHICULE_ENDPOINT = API_BASE_URL . '/comparisions/getComparisionVehicule.php';
    const GET_COMPARISION_VEHICULES_ENDPOINT = API_BASE_URL . '/comparisions/getComparisionVehicules.php';

    /*************NEWS*************/
    public static function EDIT_NEWS_ENDPOINT($newsId)
    {
        return API_BASE_URL . '/news/editNews.php?newsId=' . $newsId;
    }
    public static function DELETE_NEWS_ENDPOINT($newsId)
    {
        return API_BASE_URL . '/news/deleteNews.php?newsId=' . $newsId;
    }
    const ADD_NEWS_ENDPOINT = API_BASE_URL . '/news/addNews.php';


    /*************REVIEWS*************/
    /* BRANDS REVIEWS */
    public static function EDIT_BRAND_REVIEW_ENDPOINT($reviewId)
    {
        return API_BASE_URL . '/reviews/editBrandReview.php?reviewId=' . $reviewId;
    }
    public static function DELETE_BRAND_REVIEW_ENDPOINT($reviewId)
    {
        return API_BASE_URL . '/reviews/deleteBrandReview.php?reviewId=' . $reviewId;
    }
    public static function ADD_BRAND_REVIEW_ENDPOINT()
    {
        return API_BASE_URL . '/reviews/addBrandReview.php';
    }
    /* VEHICULES REVIEWS */
    public static function EDIT_VEHICULE_REVIEW_ENDPOINT($reviewId)
    {
        return API_BASE_URL . '/reviews/editVehiculeReview.php?reviewId=' . $reviewId;
    }
    public static function DELETE_VEHICULE_REVIEW_ENDPOINT($reviewId)
    {
        return API_BASE_URL . '/reviews/deleteVehiculeReview.php?reviewId=' . $reviewId;
    }
    public static function ADD_VEHICULE_REVIEW_ENDPOINT()
    {
        return API_BASE_URL . '/reviews/addVehiculeReview.php';
    }

    /*************USERS*************/

    const EDIT_USER_INFOS = API_BASE_URL . '/users/updateUserInfos.php';

    public static function DELETE_USER_ENDPOINT($userId)
    {
        return API_BASE_URL . '/users/deleteUser.php?userId=' . $userId;
    }
    public static function VALIDATE_USER_ENDPOINT($userId)
    {
        return API_BASE_URL . '/users/validateUser.php?userId=' . $userId;
    }
    public static function REJECT_USER_ENDPOINT($userId)
    {
        return API_BASE_URL . '/users/rejectUser.php?userId=' . $userId;
    }
    public static function FAVORITE_VEHICULE_TOGGLE_ENDPOINT($vehiculeId, $userId)
    {
        return API_BASE_URL . '/users/addFavoriteVehicule.php?vehiculeId=' . $vehiculeId . '&userId=' . $userId;
    }



    /* USER URLS */
    const HOME_URL = '/CarLog/';
    const SIGNUP_URL = '/CarLog/signUpPage/';
    const PROFILE_URL = '/CarLog/profilePage';
    const LOGIN_URL = '/CarLog/loginPage/';
    const CONTACT_URL = '/CarLog/contactPage/';
    const GUIDE_URL = '/CarLog/guidePage/';
    const BRANDS_URL = '/CarLog/brandsPage/';
    public static function BRAND_URL($brandId)
    {
        return '/CarLog/brand/?id=' . $brandId;
    }
    public static function VEHICULE_URL($vehiculeId)
    {
        return '/CarLog/vehicule/?id=' . $vehiculeId;
    }
    const COMPARATOR_URL = '/CarLog/comparatorPage/';
    public static function COMPARISION_URL($vehiculeA, $vehiculeB)
    {
        return '/CarLog/comparision/?idA=' . $vehiculeA . '&idB=' . $vehiculeB;
    }
    const NEWS_URL = '/CarLog/newsPage/';
    public static function SINGLE_NEWS_URL($newsId)
    {
        return '/CarLog/news/?id=' . $newsId;
    }
    const REVIEWS_URL = '/CarLog/reviewsPage/';


    /* ADMIN URLS */
    const ADMIN_DASHBOARD_URL = '/CarLog/admin/';
    const ADMIN_MANAGE_BRANDS_URL = '/CarLog/admin/manageBrandsPage/';
    const ADMIN_MANAGE_VEHICULES_URL = '/CarLog/admin/manageVehiculesPage/';
    const ADMIN_MANAGE_NEWS_URL = '/CarLog/admin/manageNewsPage/';
    const ADMIN_MANAGE_REVIEWS_URL = '/CarLog/admin/manageReviewsPage/';
    const ADMIN_MANAGE_BRANDS_REVIEWS_URL = '/CarLog/admin/manageBrandsReviewsPage/';
    const ADMIN_MANAGE_VEHICULES_REVIEWS_URL = '/CarLog/admin/manageVehiculesReviewsPage/';

    const ADMIN_MANAGE_USERS_URL = '/CarLog/admin/manageUsersPage/';
    const ADMIN_SETTINGS_URL = '/CarLog/admin/settings/';
    public static function EDIT_BRAND_URL($brandId)
    {
        return '/CarLog/admin/brand/?brandId=' . $brandId;
    }
    public static function EDIT_VEHICULE_URL($vehiculeId)
    {
        return '/CarLog/admin/vehicule/?vehiculeId=' . $vehiculeId;
    }
    public static function EDIT_NEWS_URL($newsId)
    {
        return '/CarLog/admin/news/?id=' . $newsId;
    }
    const EDIT_CONTACT_ENDPOINT = API_BASE_URL . '/settings/updateContactInformations.php';
    const EDIT_GUIDE_ACHAT_ENDPOINT = API_BASE_URL . '/settings/updateGuideAchat.php';

    /* OTHERS */
    const ADD_SLIDER_IMAGE_ENDPOINT = API_BASE_URL . '/settings/addSliderImage.php';
}
