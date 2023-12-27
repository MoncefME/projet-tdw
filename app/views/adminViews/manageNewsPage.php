<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/newsController.php");
class ManageNewsPage
{
    public function showPage()
    {
        ?>
        <div class="page">
            <p> Manage News Page </p>
            <?php
            $sharedView = new SharedViews();
            $sharedView->adminSideBar();
            $this->showNewsTable();
            $this->addNewsForm();
            ?>
        </div>
        <?php
    }

    public function addNewsForm()
    {

        ?>
        <form method="POST" action="/CarLog/app/api/news/addNews.php" class="addBrand-form" enctype="multipart/form-data">
            <div>
                <div>
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" placeholder="Enter title" required>
                </div>

                <div>
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" placeholder="Enter content"></textarea>
                </div>

                <div>
                    <label for="link">Link:</label>
                    <input type="text" name="link" id="link" placeholder="Enter link" required>
                </div>

                <div>
                    <label for="tags">Tags:</label>
                    <input type="text" name="tags" id="tags" placeholder="Enter tags" required>
                </div>


            </div>
            <button type="submit">Add News</button>
        </form>
        <?php

    }
    public function showNewsTable()
    {
        $newsController = new NewsController();
        $news = $newsController->getAllNews();
        ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Link</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Tags</th>
                        <th>Views Count</th>
                        <th>Likes Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($news as $item) { ?>
                        <tr>
                            <td>
                                <?php echo $item['id']; ?>
                            </td>
                            <td>
                                <?php echo $item['title']; ?>
                            </td>
                            <td>
                                <?php echo $item['content']; ?>
                            </td>
                            <td>
                                <?php echo $item['link']; ?>
                            </td>
                            <td>
                                <?php echo $item['created_at']; ?>
                            </td>
                            <td>
                                <?php echo $item['updated_at']; ?>
                            </td>
                            <td>
                                <?php echo $item['tags']; ?>
                            </td>
                            <td>
                                <?php echo $item['views_count']; ?>
                            </td>
                            <td>
                                <?php echo $item['likes_count']; ?>
                            </td>
                            <td class="table-action-btn">
                                <button class="btn btn-primary"
                                    onclick="location.href='/CarLog/admin/news/?id=<?php echo $item['id']; ?>'">Edit</button>
                                <button class="btn btn-danger" onclick="deleteNews(<?php echo $item['id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}



