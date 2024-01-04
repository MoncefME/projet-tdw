<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/userController.php');

$userId = isset($_POST['userId']) ? $_POST['userId'] : null;
$vehiculeId = isset($_POST['vehiculeId']) ? $_POST['vehiculeId'] : null;

$userController = new UserController();
$isLiked = $userController->isVehicleLikedByUser($userId, $vehiculeId);

if ($isLiked) {
    $response = $userController->deleteFavoriteVehicule($userId, $vehiculeId);
    return;
} else {
    $response = $userController->addFavoriteVehicule($userId, $vehiculeId);
    return;
}

