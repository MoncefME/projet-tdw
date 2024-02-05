<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/userController.php");

if ($_SERVER['USER']['role'] == 'admin') {
    $user_id = $_SESSION['USER']['id'];
    $userController = new UserController();
    $responce = $userController->updateUserInfo($user_id);
} else {
    echo "You are not authorized to perform this action";
}


header('Location: /CarLog/profilePage/');
