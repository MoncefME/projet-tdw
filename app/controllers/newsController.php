<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/newsModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/config/utils/formValidation.php');
class NewsController
{
    public function getNewsById($newsId)
    {
        $newModel = new NewsModel();
        return $newModel->getNewsById($newsId);
    }
    public function getAllNews()
    {
        $newModel = new NewsModel();
        return $newModel->getAllNews();
    }
    public function addNews()
    {
        $newModel = new NewsModel();
        $formValidation = new FormValidation();

        $title = $formValidation->validateInput('title');
        $content = $formValidation->validateInput('content');
        $link = $formValidation->validateInput('link');
        $tags = $formValidation->validateInput('tags');

        return $newModel->addNews($title, $content, $link, $tags);
    }
    public function updateNews($newsId)
    {
        $newModel = new NewsModel();
        $formValidation = new FormValidation();

        $title = $formValidation->validateInput('title');
        $content = $formValidation->validateInput('content');
        $link = $formValidation->validateInput('link');
        $tags = $formValidation->validateInput('tags');

        return $newModel->updateNews($newsId, $title, $content, $link, $tags);
    }
    public function deleteNews($newsId)
    {
        $newModel = new NewsModel();
        return $newModel->deleteNews($newsId);
    }
}
