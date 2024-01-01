<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/newsController.php");
class ManageNewsPage
{
    public function showPage()
    {
        $sharedView = new SharedViews();
        ?>
        <div class="dashboard__page">
            <?php
            $sharedView->adminSideBar();
            ?>
            <div class="dashboard__content">
                <div class="dashboard__header-news">
                    <h1>Manage News</h1>
                    <button class="btn btn-dark" id="toggleButtonNews">
                        <i class="fas fa-plus"></i>
                        <span>Add News</span>
                    </button>
                </div>
                <?php
                $this->showNewsTable();
                $this->addNewsForm();
                ?>
            </div>
        </div>
        <?php
    }

    public function addNewsForm()
    {
        ?>
        <div class="news__form" id="newForm" style="display:none;">
            <form method="POST" action="<?= ApiRouter::ADD_NEWS_ENDPOINT ?>" enctype="multipart/form-data">
                <div class="news__form__inputs__container">
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" placeholder="Enter title" required>
                    </div>

                    <div>
                        <label for="link">Link:</label>
                        <input type="text" name="link" id="link" placeholder="Enter link" required>
                    </div>

                    <div>
                        <label for="tags">Tags:</label>
                        <input type="text" name="tags" id="tags" placeholder="Enter tags" required>
                    </div>

                    <div>
                        <label for="content">Content:</label>
                        <textarea name="content" id="content" placeholder="Enter content"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">
                    <i class="fas fa-plus"></i>
                    <span> Add News</span>
                </button>
            </form>
        </div>
        <?php
    }
    public function showNewsTable()
    {
        $newsController = new NewsController();
        $news = $newsController->getAllNews();
        ?>
        <div class="news__table" id="newsTable" style="display: none;">
            <table class="table table-hover" id="newTable">
                <thead class="thead-light">
                    <tr>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Tags</th>
                        <th>
                            <i class="fas fa-eye"></i>
                        </th>
                        <th>
                            <i class="fas fa-heart"></i>
                        </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($news as $item) { ?>
                        <tr>
                            <td>
                                <?php echo $item['title']; ?>
                            </td>
                            <td>
                                <?php echo $item['created_at']; ?>
                            </td>
                            <td>
                                <?php echo $item['updated_at']; ?>
                            </td>
                            <td>
                                <?php
                                $tags = explode(',', $item['tags']);
                                foreach ($tags as $tag) {
                                    $tag = trim($tag);
                                    if (!empty($tag)) {
                                        echo '<span class="badge badge-primary">' . $tag . '</span> ';
                                    }
                                }
                                ?>
                            </td>

                            <td>
                                <?php echo $item['views_count']; ?>
                            </td>
                            <td>
                                <?php echo $item['likes_count']; ?>
                            </td>
                            <td class="table__action__btn">
                                <button class="btn btn-primary"
                                    onclick="location.href='/CarLog/admin/news/?id=<?php echo $item['id']; ?>'">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="deleteNews(<?= $item['id']; ?>)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}



