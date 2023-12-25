<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/userController.php');
$id = isset($_POST['userId']) ? $_POST['userId'] : null;
$userController = new UserController();
$response = $userController->deleteUser($id);
if ($response) {
    echo 'User deleted';
} else {
    echo 'Error while deleting user';
}
