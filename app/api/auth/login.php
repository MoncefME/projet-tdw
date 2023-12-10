<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/userController.php');

$userController = new UserController();
$responce = $userController->loginUser();
echo 'Responce is ' . $responce;