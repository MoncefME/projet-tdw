<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/settingsController.php');
$settingsController = new SettingsController();
$responce = $settingsController->addSliderImage();

header('Location: /CarLog/admin/settings');