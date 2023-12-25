<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/userController.php');
$id = isset($_POST['userId']) ? $_POST['userId'] : null;
$userController = new UserController();
$response = $userController->validateUser($id);
if ($response) {
    echo 'User validated';
} else {
    echo 'Error while validating user';
}
