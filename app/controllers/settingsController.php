<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/settingsModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/config/utils/formValidation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/config/utils/uploadFile.php');
class SettingsController
{
    public function getContactInformations()
    {
        $settingsModel = new SettingsModel();
        return $settingsModel->getContactInformations();
    }

    public function updateContactInformations()
    {
        $settingsModel = new SettingsModel();

        $email = FormValidation::validateInput('email');
        $phone = FormValidation::validateInput('phone');
        $address = FormValidation::validateInput('address');
        $website = FormValidation::validateInput('website');
        $facebook_link = FormValidation::validateInput('facebook_link');
        $twitter_link = FormValidation::validateInput('twitter_link');
        $youtube_link = FormValidation::validateInput('youtube_link');
        $linkedin_link = FormValidation::validateInput('linkedin_link');
        $instagram_link = FormValidation::validateInput('instagram_link');

        return $settingsModel->updateContactInformations($email, $phone, $address, $website, $facebook_link, $twitter_link, $youtube_link, $linkedin_link, $instagram_link);
    }
    public function getGuideAchat()
    {
        $settingsModel = new SettingsModel();
        return $settingsModel->getGuideAchat();

    }
    public function addGuideAchat()
    {
        $settingsModel = new SettingsModel();
        $title = FormValidation::validateInput('title');
        $content = FormValidation::validateInput('content');

        return $settingsModel->addGuideAchat($title, $content);
    }
    public function updateGuideAchat()
    {
        $settingsModel = new SettingsModel();
        $title = FormValidation::validateInput('title');
        $content = FormValidation::validateInput('content');

        return $settingsModel->updateGuideAchat($title, $content);
    }

    public function getSliderImages(){
        $settingsModel = new SettingsModel();
        return $settingsModel->getSliderImages();
    }

    public function getSliderImageById($id){
        $settingsModel = new SettingsModel();
        return $settingsModel->getSliderImageById($id);
    } 

    public function deleteSliderImage($id){
        $settingsModel = new SettingsModel();
        return $settingsModel->deleteSliderImage($id);
    }

    public function addSliderImage(){
        $settingsModel = new SettingsModel();
        $news_id = FormValidation::validateInput('news_id');

        $uploadHandler = new UploadFile();
        $uploadedFileName = $uploadHandler->uploadSliderImage();
        return $settingsModel->addSliderImage($uploadedFileName, $news_id);
    }

    public function updateImageSlider($id){
        $settingsModel = new SettingsModel();
        $news_id = FormValidation::validateInput('news_id');

        $uploadHandler = new UploadFile();
        $uploadedFileName = $uploadHandler->uploadSliderImage();

        return $settingsModel->updateImageSlider($uploadedFileName, $news_id, $id);
    }
    
}
