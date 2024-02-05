<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/userController.php');

if ($_SERVER['USER']['role'] == 'admin') {
    $id = isset($_POST['userId']) ? $_POST['userId'] : null;
    $userController = new UserController();
    $response = $userController->rejectUser($id);
} else {
    echo "You are not authorized to perform this action";
}
