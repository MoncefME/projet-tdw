<?php
class ApiRouter
{
    const LOGIN_ENDPOINT = API_BASE_URL . '/auth/login.php';
    const SIGNUP_ENDPOINT = API_BASE_URL . '/auth/signup.php';
    const LOGOUT_ENDPOINT = API_BASE_URL . '/auth/logout.php';
    private static $URLs = [
        'HOME_PAGE' => "/CarLog/",
        'SIGNUP_PAGE' => "/CarLog/signUpPage/",
        'PROFILE_PAGE' => "/CarLog/profilePage",
        'ADMIN_DASHBOARD' => '/CarLog/admin/'
    ];

    public static function getUrl($routeKey)
    {
        return self::$URLs[$routeKey] ?? null;
    }

}
