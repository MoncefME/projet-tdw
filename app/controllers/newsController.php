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

        $title = FormValidation::validateInput('title');
        $content = FormValidation::validateInput('content');
        $link = FormValidation::validateInput('link');
        $tags = FormValidation::validateInput('tags');

        // $uploadHandler = new UploadFile();
        // $uploadedFileName = $uploadHandler->uploadNewsFile();

        return $newModel->addNews($title, $content, $link, $tags);
    }
    public function updateNews($newsId)
    {
        $newModel = new NewsModel();

        $title = FormValidation::validateInput('title');
        $content = FormValidation::validateInput('content');
        $link = FormValidation::validateInput('link');
        $tags = FormValidation::validateInput('tags');

        return $newModel->updateNews($newsId, $title, $content, $link, $tags);
    }
    public function deleteNews($newsId)
    {
        $newModel = new NewsModel();
        return $newModel->deleteNews($newsId);
    }
}
