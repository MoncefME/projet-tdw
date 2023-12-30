<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/userController.php');

$userController = new UserController();
$responce = $userController->loginUser();

if ($responce['status'] === 200) {
    header("Location: /CarLog/");
} else {
    header("Location: /CarLog/loginPage/");
}
