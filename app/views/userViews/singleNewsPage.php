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
        $shardViews = new SharedViews();
        ?>
        <div class="page__content">
            <?php
            $shardViews->showHeader();
            $this->showNewsContent();
            $shardViews->showFooter();
            ?>
        </div>
        <?php
    }

    private function showNewsContent()
    {
        $newsController = new NewsController();
        $news = $newsController->getNewsById($this->id);
        $tags = explode(',', $news['tags']);
        ?>
        <div class="single__news__content">
            <div class="news__header">
                <div class="news__cover__img">
                    <img src="/CarLog/public/images/background-1.jpg">
                </div>
                <div class="news__title">
                    <h1>
                        <?= $news['title']; ?>
                    </h1>
                    <p>
                        <?= $news['created_at']; ?>
                        <a href=<?= $news['link']; ?>>
                            Original article
                        </a>
                    </p>
                    <div class="news__tags">
                        <p>
                            <?php
                            foreach ($tags as $tag) {
                                $tag = trim($tag);
                                if (!empty($tag)) {
                                    echo '<span class="badge badge-primary">' . $tag . '</span> ';
                                }
                            }
                            ?>
                        </p>
                    </div>
                </div>

            </div>
            <div class="news__body">
                <p>
                    <?php echo $news['content']; ?>
                </p>
            </div>
        </div>
        <?php
    }
}