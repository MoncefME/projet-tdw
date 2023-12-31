<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class ManageBReviewsPage
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
                <div class="dashboard__header-brands">
                    <h1>Manage Brand Reviews</h1>
                </div>
                <?php
                $this->showBrandReviewsTable();
                ?>
            </div>
        </div>
        <?php
    }

    public function showBrandReviewsTable()
    {
        $brandReviewsController = new BrandReviewsController();
        $reviews = $brandReviewsController->getAllBrandReviews();
        $userController = new UserController();
        $brandConroller = new BrandController();
        ?>
        <div class="brand__reviews__table">
            <div id="loader">Loading...</div>
            <table class="table table-hover" id="brandReviewTable" style="display: none;">
                <thead>
                    <tr>
                        <th>User </th>
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
                                <?php
                                $user = $userController->getUserById($review['user_id']);
                                ?>
                                <img src="<?= ImageUtility::getUserProfilePicture($user) ?>" alt="User Picture" width="50"
                                    height="auto">
                            </td>
                            <td>
                                <?php
                                $brand = $brandConroller->getBrandById($review['brand_id']);
                                ?>
                                <img src="<?= ImageUtility::getBrandLogo($brand) ?>" alt="Brand Picture" width="50" height="auto">
                            </td>
                            <td>
                                <?php echo $review['rating']; ?>
                            </td>
                            <td>
                                <?php echo $review['comment']; ?>
                            </td>
                            <td>
                                <p
                                    class="badge <?= $review['status'] === 'PENDING' ? 'badge-warning' : ($review['status'] === 'VALID' ? 'badge-success' : 'badge-danger') ?>">
                                    <?= $review['status'] ?>
                                </p>
                            </td>

                            <td>
                                <div class="table__action__btn">
                                    <button class="btn btn-success" onclick="validateBrandReview(<?= $review['id'] ?>)">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-danger" onclick="rejectBrandReview(<?= $review['id'] ?>)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
    }

}


