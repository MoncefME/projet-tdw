<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class ManageVReviewsPage
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
                    <h1>Manage Vehicule Reviews</h1>
                </div>
                <?php
                $this->showVehiculeReviewsTable();
                ?>
            </div>
        </div>
        <?php
    }

    public function showVehiculeReviewsTable()
    {
        $vehiculeReviewsController = new VehiculeReviewsController();
        $reviews = $vehiculeReviewsController->getAllVehiculeReviews();
        $userController = new UserController();
        $vehiculeController = new VehiculeController();
        ?>
        <div class="vehicule__reviews__table">
            <table class=" table table-hover" id="vehiculeReviewTable">
                <thead class="thead-light">
                    <tr>
                        <th>User</th>
                        <th>Vehicule</th>
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
                                $vehicule = $vehiculeController->getVehiculeById($review['vehicule_id']);
                                ?>
                                <img src="<?= ImageUtility::getVehiculePicture($vehicule) ?>" alt="Vehicule Picture" width="50"
                                    height="auto">
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
                                    <button class="btn btn-success" onclick="validateVehiculeReview(<?= $review['id'] ?>)">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-danger" onclick="rejectVehiculeReview(<?= $review['id'] ?>)">
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


