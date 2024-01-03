<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/settingsController.php");

$settingsController = new SettingsController();
$guideAchat = $settingsController->updateGuideAchat();

header('Location: /CarLog/admin/settings/');
