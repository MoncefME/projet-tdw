<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/newsController.php");
class NewsPage
{
    public function showPage()
    {
        $shardViews = new SharedViews();
        $shardViews->showHeader();
        echo 'NewsPage';
        $this->showAllNews();
        $shardViews->showFooter();
    }
    public function showAllNews()
    {
        $newsController = new NewsController();
        $news = $newsController->getAllNews();
        ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Link</th>
                        <th>Tags</th>
                        <th>Views Count</th>
                        <th>Likes Count</th>
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
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}
