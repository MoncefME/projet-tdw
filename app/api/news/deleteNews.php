<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/newsController.php');

$id = isset($_POST['newsId']) ? $_POST['newsId'] : null;

$newsController = new NewsController();
$response = $newsController->deleteNews($id);
