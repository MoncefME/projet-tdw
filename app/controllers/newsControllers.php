<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/newsModel.php');
class NewsControllers
{
    public function getNewsById($newsId)
    {
        $newModel = new NewsModel();
        $news = $newModel->getNewsById($newsId);
        return $news;
    }
    public function getAllNews()
    {
        $newModel = new NewsModel();
        $news = $newModel->getAllNews();
        return $news;
    }
    public function addNews($title, $content, $link, $tags)
    {
        $newModel = new NewsModel();

        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $link = isset($_POST['link']) ? $_POST['link'] : '';
        $tags = isset($_POST['tags']) ? $_POST['tags'] : '';

        $success = $newModel->addNews($title, $content, $link, $tags);
        return $success;
    }
    public function updateNews($newsId)
    {
        $newModel = new NewsModel();

        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $link = isset($_POST['link']) ? $_POST['link'] : '';
        $tags = isset($_POST['tags']) ? $_POST['tags'] : '';

        $success = $newModel->updateNews($newsId, $title, $content, $link, $tags);
        return $success;
    }
    public function deleteNews($newsId)
    {
        $newModel = new NewsModel();
        $success = $newModel->deleteNews($newsId);
        return $success;
    }
}
