<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/newsController.php");
class SingleNewsPage
{
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function showPage()
    {

        $sharedViews = new SharedViews();
        $sharedViews->showHeader();
        $this->showInfoTable();
        $sharedViews->showFooter();

    }

    private function showInfoTable()
    {
        $newsController = new NewsController();
        $news = $newsController->getNewsById($this->id);
        ?>
        <div>
            <h1>
                <?php echo $news['title']; ?>
            </h1>
            <p>
                <?php echo $news['content']; ?>
            </p>
            <p>
                <?php echo $news['created_at']; ?>
            </p>
            <a href=<?php echo $news['link']; ?>>
                Original article
            </a>
            <p>
                <?php echo $news['tags']; ?>
            </p>
        </div>
        <?php
    }
}