<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/newsController.php');

if ($_SERVER['USER']['role'] == 'admin') {
    $id = isset($_GET['newsId']) ? $_GET['newsId'] : null;
    $newsController = new NewsController();
    $responce = $newsController->updateNews($id);
} else {
    echo "You are not authorized to perform this action";
}

header("Location: /CarLog/admin/manageNewsPage/");
