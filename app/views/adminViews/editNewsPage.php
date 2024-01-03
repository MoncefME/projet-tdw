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
        $newsController = new NewsController();
        $news = $newsController->getNewsById($this->id);
        ?>
        <div class="news__form">
            <form method="POST" action="<?= ApiRouter::EDIT_NEWS_ENDPOINT($news['id']) ?>" enctype="multipart/form-data">
                <div class="news__form__inputs__container">
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" placeholder="Enter title" required
                            value="<?php echo $news['title'] ?>">
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
                    <!-- <div>
                        <label for="content">Content:</label>
                        <textarea name="content" id="content" placeholder="Enter content"
                            required><?= $news['content'] ?></textarea>
                    </div> -->


                    <!-- <div>
                    <label for="newsPicture">News Picture:</label>
                    <input type="file" name="newsPicture" id="newsPicture" accept="image/*" onChange="previewInputImage(event)">
                    <input type="hidden" name="currentPicture" value="<?= $news['newsPicture'] ?>">
                    <img id="previewImage" src="<?= ImageUtility::getNewsPicture($news) ?>" alt="Preview"
                        style="width: 100px; height: 100px;">
                </div> -->
                </div>
                <div>
                    <label for="content">Content:</label>
                    <div id="summernote" placeholder="Enter content">
                        <?= $news['content'] ?>
                    </div>
                    <input type="hidden" name="content" id="content">
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














