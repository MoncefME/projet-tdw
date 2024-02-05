<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/newsController.php');

if ($_SERVER['USER']['role'] == 'admin') {
    $id = isset($_POST['newsId']) ? $_POST['newsId'] : null;
    $newsController = new NewsController();
    $response = $newsController->deleteNews($id);
} else {
    echo "You are not authorized to perform this action";
}
