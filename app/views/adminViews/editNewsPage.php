<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/newsController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");

class EditNewsPage
{
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function showPage()
    {
        ?>
        <div class="page">
            <p>Edit News
                <?php echo $this->id; ?> Page
            </p>
            <?php
            $sharedView = new SharedViews();
            $sharedView->adminSideBar();
            $this->showNewsForm();
            ?>
        </div>
        <?php
    }

    private function showNewsForm()
    {
        $newsController = new NewsController();
        $news = $newsController->getNewsById($this->id);
        ?>
        <form method="POST" action="/CarLog/app/api/news/editNews.php?newsId=<?php echo $news['id'] ?>" class="addBrand-form"
            enctype="multipart/form-data">
            <div>
                <div>
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" placeholder="Enter title" required
                        value="<?php echo $news['title'] ?>">
                </div>

                <div>
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" placeholder="Enter content"
                        required><?php echo $news['content'] ?></textarea>
                </div>

                <div>
                    <label for="link">Link:</label>
                    <input type="text" name="link" id="link" placeholder="Enter link" required
                        value="<?php echo $news['link'] ?>">
                </div>

                <div>
                    <label for="tags">Tags:</label>
                    <input type="text" name="tags" id="tags" placeholder="Enter tags" required
                        value="<?php echo $news['tags'] ?>">
                </div>

            </div>
            <button type="submit">Edit News</button>
        </form>
        <?php
    }
}














