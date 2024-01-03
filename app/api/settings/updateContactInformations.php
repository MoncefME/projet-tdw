<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/settingsController.php');
$settingsController = new SettingsController();
$contactInformations = $settingsController->updateContactInformations();
header('Location: /CarLog/admin/settings/');
