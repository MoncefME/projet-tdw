<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/userController.php');
$id = isset($_POST['userId']) ? $_POST['userId'] : null;
$userController = new UserController();
$response = $userController->rejectUser($id);
if ($response) {
    echo 'User rejected';
} else {
    echo 'Error while rejecting user';
}
