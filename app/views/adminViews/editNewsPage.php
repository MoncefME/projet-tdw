<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/newsController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");

class EditNewsPage
{
    private $id;
    private $news;
    public function __construct($id)
    {
        $this->id = $id;
        $newsController = new NewsController();
        $this->news = $newsController->getNewsById($id);
        if ($this->news == null) {
            header('Location: /CarLog/notFound');
        }
    }

    public function showPage()
    {
        $sharedView = new SharedViews();
        ?>
        <div class="dashboard__page">
            <?php
            $sharedView->adminSideBar();
            ?>
            <div class="dashboard__content">
                <div class="dashboard__header-brands">
                    <h1>Edit News </h1>
                </div>
                <?php
                $this->showNewsForm();
                ?>
            </div>
        </div>
        <?php
    }

    private function showNewsForm()
    {
        // $newsController = new NewsController();
        // $news = $newsController->getNewsById($this->id);
        $news = $this->news;
        ?>
        <div class="news__form">
            <form method="POST" action="<?= ApiRouter::EDIT_NEWS_ENDPOINT($news['id']) ?>" enctype="multipart/form-data">
                <div class="news__form__inputs__container">
                    <div>
                        <label for="title">Title:
                            <i class="fas fa-star-of-life"></i>
                        </label>
                        <input type="text" name="title" id="title" placeholder="Enter title" required
                            value="<?php echo $news['title'] ?>">
                    </div>

                    <div>
                        <label for="link">Link:
                            <i class="fas fa-link"></i>
                        </label>
                        <input type="text" name="link" id="link" placeholder="Enter link" required
                            value="<?php echo $news['link'] ?>">
                    </div>

                    <div>
                        <label for="tags">Tags:
                            <i class="fas fa-tags"></i>
                        </label>
                        <input type="text" name="tags" id="tags" placeholder="Enter tags" required
                            value="<?php echo $news['tags'] ?>">
                    </div>
                    <div>
                        <label for="content">Content:
                            <i class="fas fa-file-alt"></i>
                        </label>
                        <textarea name="content" id="content" placeholder="Enter content"
                            required><?= $news['content'] ?></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">
                    <i class="fas fa-plus"></i>
                    <span> Edit News</span>
                </button>
            </form>
        </div>
        <?php
    }
}














