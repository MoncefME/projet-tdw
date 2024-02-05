<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/settingsController.php');

if ($_SERVER['USER']['role'] == 'admin') {
    $settingsController = new SettingsController();
    $responce = $settingsController->addSliderImage();
} else {
    echo "You are not authorized to perform this action";
}

header('Location: /CarLog/admin/settings');
