<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class ManageVReviewsPage
{
    public function showPage()
    {
        ?>
        <div class="page">
            <?php
            $sharedView = new SharedViews();
            $sharedView->adminSideBar();
            ?>
            <p>Manage Vehicule Reviews</p>
            <?php
            $this->showVehiculeReviewsTable();
            ?>
        </div>
        <?php
    }

    public function showVehiculeReviewsTable()
    {
        $vehiculeReviewsController = new VehiculeReviewsController();
        $reviews = $vehiculeReviewsController->getAllVehiculeReviews();

        $vehiculeController = new VehiculeController();
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
                            $vehicule = $vehiculeController->getVehiculeById($review['vehicule_id']);
                            echo $vehicule['model'] . '-' . $vehicule['version'] . '-' . $vehicule['year'];
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
                                onclick="validateVehiculeReview(<?php echo $review['id'] ?>)">Validate</button>
                            <button class="btn btn-danger"
                                onclick="rejectVehiculeReview(<?php echo $review['id'] ?>)">Reject</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
    }

}


