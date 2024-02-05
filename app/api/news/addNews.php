<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/newsController.php');

if ($_SERVER['USER']['role'] == 'admin') {
    $newsController = new NewsController();
    $response = $newsController->addNews();
} else {
    echo "You are not authorized to perform this action";
}

header("Location: /CarLog/admin/manageNewsPage/");
