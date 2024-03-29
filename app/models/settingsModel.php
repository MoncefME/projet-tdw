<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/databaseController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/config/queries/settingQueries.php");
class SettingsModel
{
    public function getContactInformations()
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = SettingQueries::getContactInformations;
        $contacts = $dbController->request($database, $query);

        $dbController->disConnect($database);
        return $contacts[0];
    }
    public function updateContactInformations($email, $phone, $address, $website, $facebook_link, $twitter_link, $youtube_link, $linkedin_link, $instagram_link)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = SettingQueries::updateContactInformations;
        $params = [$email, $phone, $address, $website, $facebook_link, $twitter_link, $youtube_link, $linkedin_link, $instagram_link];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }

    public function getGuideAchat()
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = SettingQueries::getGuideAchat;
        $guideAchat = $dbController->request($database, $query);

        $dbController->disConnect($database);
        return $guideAchat[0];
    }
    public function addGuideAchat($title, $content)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = SettingQueries::addGuideAchat;
        $current_time = date("Y-m-d H:i:s");
        $params = [$title, $content, $current_time];

        $success = $dbController->request($database, $query, $params);
        $dbController->disConnect($database);
        return $success !== false;
    }
    public function updateGuideAchat($title, $content)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = SettingQueries::updateGuideAchat;
        $current_time = date("Y-m-d H:i:s");
        $params = [$title, $content, $current_time];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }

    public function getSliderImages(){
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = SettingQueries::getSliderImages;
        $sliderImage = $dbController->request($database, $query);

        $dbController->disConnect($database);
        return $sliderImage;
    }

    public function deleteSliderImage(){
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = SettingQueries::deleteSliderImage;
        $success = $dbController->request($database, $query);

        $dbController->disConnect($database);
        return $success !== false;
    }

    public function addSliderImage($image_url , $newsId){
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = SettingQueries::addSliderImage;
        $params = [$image_url , $newsId];
        $success = $dbController->request($database, $query , $params);

        $dbController->disConnect($database);
        return $success !== false;
    }

    public function updateImageSlider($image_url , $newsId){
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = SettingQueries::updateImageSlider;
        $params = [$image_url , $newsId];
        $success = $dbController->request($database, $query , $params);

        $dbController->disConnect($database);
        return $success !== false;
    }

    public function getSliderImageById($id){
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = SettingQueries::getSliderImageById;
        $params = [$id];
        $sliderImage = $dbController->request($database, $query , $params);

        $dbController->disConnect($database);
        return $sliderImage[0];
    }

}