<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/settingsModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/config/utils/formValidation.php');
class SettingsController
{

    public function getContactInformations()
    {
        $settingsModel = new SettingsModel();
        return $settingsModel->getContactInformations();
    }

    public function updateNews()
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
        $title = FormValidation::validateInput('title');
        $content = FormValidation::validateInput('content');
        // $created_at = FormValidation::validateInput('created_at');
        $updated_at = FormValidation::validateInput('updated_at');

        return $settingsModel->getGuideAchat($title, $content, $updated_at);

    }

}
