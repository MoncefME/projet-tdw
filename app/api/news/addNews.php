<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/newsController.php');

$newsController = new NewsController();
$response = $newsController->addNews();

header("Location: /CarLog/admin/manageNewsPage/");