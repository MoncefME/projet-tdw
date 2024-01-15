<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/newsController.php");
class NewsPage
{
    public function showPage()
    {
        $shardViews = new SharedViews();
        ?>
        <div class="page__content">
            <?php
            $shardViews->showHeader();
            $shardViews->showNavBar();
            $this->showNewsCards();
            $shardViews->showFooter();
            ?>
        </div>
        <?php
    }
    public function showNewsCards()
    {
        $newsController = new NewsController();
        $news = $newsController->getAllNews();
        ?>
        <div class="news__list__container">
            <?php
            foreach ($news as $singleNews) {
                $this->showNewsCard($singleNews);
            }
            ?>
        </div>
        <?php
    }

    private function showNewsCard($news)
    {
        ?>
        <div class="news__card">
            <div class="news__card__body">
                <img src="<?= ImageUtility::getNewsPicture($news); ?>" alt="News Image" >
                <h3>
                    <?= $news['title']; ?>
                </h3>
                <p>
                    <?= $news['created_at']; ?>
                </p>
                <!-- <p>
                    <?= substr($news['content'], 0, strpos($news['content'], "\n") ?: strlen($news['content'])); ?>
                </p> -->
                <a href="/CarLog/news/?id=<?= $news['id']; ?>" class="btn btn-dark">Read More</a>
            </div>
        </div>
        <?php
    }

    public function showNothing()
    {
        $news = [];
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Link</th>
                    <th>Tags</th>
                    <th>Views Count</th>
                    <th>Likes Count</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($news as $news) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $news['title']; ?>
                        </td>
                        <td>
                            <?php echo $news['content']; ?>
                        </td>
                        <td>
                            <?php echo $news['link']; ?>
                        </td>
                        <td>
                            <?php echo $news['tags']; ?>
                        </td>
                        <td>
                            <?php echo $news['views_count']; ?>
                        </td>
                        <td>
                            <?php echo $news['likes_count']; ?>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
}

