<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/newsController.php');
$id = isset($_GET['newsId']) ? $_GET['newsId'] : null;
$newsController = new NewsController();
$responce = $newsController->updateNews($id);
print_r($responce);

header("Location: /CarLog/admin/manageNewsPage/");