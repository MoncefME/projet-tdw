<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/userController.php");
$user_id = $_SESSION['USER']['id'];
$userController = new UserController();
$responce = $userController->updateUserInfo($user_id);
//echo json_encode($responce);
header('Location: /CarLog/profilePage/');