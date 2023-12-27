<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/newsController.php');
$id = isset($_POST['newsId']) ? $_POST['newsId'] : null;
$newsController = new NewsController();
$response = $newsController->deleteNews($id);
if ($response) {
    echo 'News deleted';
} else {
    echo 'Error while deleting News';
}