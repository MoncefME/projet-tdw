<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/userController.php');
class HomePage
{
    public function showPage()
    {
        if (isset($_SESSION['USER'])) {
            echo 'homePage, Welcome : ' . $_SESSION['USER']['lastName'] . ' ' . $_SESSION['USER']['firstName'];
        } else {
            echo "homePage,as a Guest";
        }

    }
}
