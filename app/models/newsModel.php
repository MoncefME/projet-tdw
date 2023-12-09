<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/Config/queries/userQueries.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/databaseController.php');
class NewsModel
{
    public function getNewsById($newsId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = NewsQueries::getNewsById();
        $params = [$newsId];
        $news = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $news;
    }
    public function getAllNews()
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = NewsQueries::getNewsById();
        $news = $dbController->request($database, $query);

        $dbController->disConnect($database);
        return $news;
    }
    public function addNews($title, $content, $link, $tags)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = NewsQueries::addNews();
        $params = [$title, $content, $link, $tags];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function updateNews($newsId, $title, $content, $link, $tags)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = NewsQueries::updateNews();
        $params = [$title, $content, $link, $tags, $newsId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function deleteNews($newsId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = NewsQueries::deleteNews();
        $params = [$newsId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
}
