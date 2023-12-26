<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class ManageBReviewsPage
{
    public function showPage()
    {
        ?>
        <div class="page">
            <?php
            $sharedView = new SharedViews();
            $sharedView->adminSideBar();
            ?>
            <p>Manage Brand Reviews</p>
            <?php
            $this->showBrandReviewsTable();
            ?>
        </div>
        <?php
    }

    public function showBrandReviewsTable()
    {
        $brandReviewsController = new BrandReviewsController();
        $reviews = $brandReviewsController->getAllBrandReviews();

        $brandConroller = new BrandController();
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Brand</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review) { ?>
                    <tr>
                        <td>
                            <?php echo $review['user_id']; ?>
                        </td>
                        <td>
                            <?php
                            $brand = $brandConroller->getBrandById($review['brand_id']);
                            echo $brand['name'];
                            ?>
                        </td>
                        <td>
                            <?php echo $review['rating']; ?>
                        </td>
                        <td>
                            <?php echo $review['comment']; ?>
                        </td>
                        <td>
                            <?php echo $review['status']; ?>
                        </td>
                        <td>
                            <button class="btn btn-primary"
                                onclick="validateBrandReview(<?php echo $review['id'] ?>)">Validate</button>
                            <button class="btn btn-danger" onclick="rejectBrandReview(<?php echo $review['id'] ?>)">Reject</button>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
    }

}


