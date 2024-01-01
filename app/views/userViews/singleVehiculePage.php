<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/userController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeReviewsController.php");
class SingleVehiculePage
{
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    // public function showPage()
    // {

    //     $sharedViews = new SharedViews();
    //     $sharedViews->showHeader();
    //     $this->();
    //     $sharedViews->showFooter();
    // }

    public function showPage()
    {
        $shardViews = new SharedViews();
        ?>
        <div class="page__content">
            <?php
            $shardViews->showHeader();
            ?>
            <div class="vehicule__main__section">
                <?php
                $this->showVehiculeInfo();
                ?>
                <div class="reviews__section">
                    <?= $this->showVehiculeReviews(); ?>
                </div>
            </div>
            <?php
            $shardViews->showFooter();
            ?>
        </div>
        <?php
    }

    public function showVehiculeInfo()
    {
        $vehiculeController = new VehiculeController();
        $vehicule = $vehiculeController->getVehiculeById($this->id);

        $brandController = new BrandController();
        $brand = $brandController->getBrandById($vehicule['brand_id']);

        ?>
        <div class="vehicule__information__container">
            <?= $this->showVehiculeLikeButton($vehicule); ?>
            <div>
                <img src="<?= ImageUtility::getVehiculePicture($vehicule); ?>" alt="<?php echo $vehicule['vehiculePicture'] ?>"
                    width="400" height="auto">
            </div>
            <div>
                <div class="information-grid">
                    <?php foreach ($vehicule as $key => $value) {
                        if ($key == 'id' || $key == 'brand_id' || $key == 'vehiculePicture')
                            continue;
                        ?>
                        <div class="vehicule__information__card">
                            <p>
                                <?= ucfirst($key) ?>:
                                <?= $value ?>
                            </p>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
        <?php
    }


    public function showVehiculeInformations()
    {
        $vehiculeController = new VehiculeController();
        $vehicule = $vehiculeController->getVehiculeById($this->id);

        $brandController = new BrandController();
        $brand = $brandController->getBrandById($vehicule['brand_id']);

        ?>
        <table class="table vehicule-info-table">
            <tbody>
                <tr>
                    <td>Model:</td>
                    <td>
                        <?php echo $vehicule['model']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Brand</td>
                    <td><img src="/CarLog/public/uploads/brands/<?php echo $brand['brandPicture'] ?>"
                            alt="<?php echo $brand['brandPicture'] ?>" width="50px" height="50px"></td>
                </tr>
                <tr>
                    <td>Version:</td>
                    <td>
                        <?php echo $vehicule['version']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Year:</td>
                    <td>
                        <?php echo $vehicule['year']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Vehicle Picture:</td>
                    <td><img src="/CarLog/public/uploads/vehicules/<?php echo $vehicule['vehiculePicture'] ?>"
                            alt="<?php echo $vehicule['vehiculePicture'] ?>" width="50px" height="50px"></td>
                </tr>
                <tr>
                    <td>Length:</td>
                    <td>
                        <?php echo $vehicule['length']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Width:</td>
                    <td>
                        <?php echo $vehicule['width']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Height:</td>
                    <td>
                        <?php echo $vehicule['height']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Wheel Base:</td>
                    <td>
                        <?php echo $vehicule['wheelBase']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Engine:</td>
                    <td>
                        <?php echo $vehicule['engine']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Performance:</td>
                    <td>
                        <?php echo $vehicule['performance']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <?php echo $vehicule['price']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Consumption:</td>
                    <td>
                        <?php echo $vehicule['consumption']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Note:</td>
                    <td>
                        <?php echo $vehicule['note']; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
    }

    public function showVehiculeReviews()
    {
        $vehiculeReviewsController = new VehiculeReviewsController();
        $vehiculeReviews = $vehiculeReviewsController->getValidReviewsByVehicule($this->id);
        $userController = new UserController();
        ?>
        <h1>Reviews</h1>
        <div class="reviews__table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Comment</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($vehiculeReviews as $review) {
                        $user = $userController->getUserById($review['user_id']);
                        ?>
                        <tr>
                            <td>
                                <img src="<?= ImageUtility::getUserProfilePicture($user) ?>" alt="user profile picture" width="50px"
                                    height="50px">
                            </td>
                            <td>
                                <?php echo $review['comment']; ?>
                            </td>
                            <td>
                                <?php echo $review['rating']; ?>
                            </td>
                        </tr>
                        <?php
                    } ?>
                </tbody>
            </table>
            <?php
            if (isset($_SESSION['USER']) && $_SESSION['USER']['role'] != 'GUEST') {
                $this->showVehiculeReviewForm();
            } else {
                ?>
                <div class="review-message">
                    <p>You must be logged in to add a review</p>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }



    private function showReviewMessage()
    {
        ?>
        <div class="review-message">
            <?php
            if (isset($_SESSION['REVIEW-MESSAGE'])) {
                echo $_SESSION['REVIEW-MESSAGE'];
                unset($_SESSION['REVIEW-MESSAGE']);
            }
            ?>
        </div>
        <?php
    }

    public function showVehiculeReviewForm()
    {
        ?>
        <div class="add__review__form">
            <form method="POST" action="/CarLog/app/api/reviews/vehicule/addReview.php?vehiculeId=<?php echo $this->id ?>"
                class="login-form">
                <div>
                    <div class="comment__input">
                        <input type="text" name="comment" id="comment" placeholder="Enter comment" required>
                    </div>
                    <?= ReviewsPage::showReviews(); ?>
                    <div>
                        <button type="submit" class="btn btn-info">Add Review</button>
                        <?php $this->showReviewMessage(); ?>
                    </div>
                </div>
            </form>
        </div>
        <?php
    }

    public function showVehiculeLikeButton($vehicule)
    {
        $userController = new UserController();
        if (isset($_SESSION['USER'])) {
            $isLiked = $userController->isVehicleLikedByUser($_SESSION['USER']['id'], $vehicule['id']);
            ?>
            <div class="vehicule__like__btn">
                <button onclick="addFavoriteVehicule(<?php echo $_SESSION['USER']['id']; ?>, <?php echo $vehicule['id']; ?>)"
                    class="<?php echo $isLiked ? 'liked' : '' ?>">
                    <?php if ($isLiked) { ?>
                        <img src="/CarLog/public/icons/liked.png" alt="like-filled" width="20" height="20">
                    <?php } else { ?>
                        <img src="/CarLog/public/icons/like.png" alt="like" width="20" height="20">
                    <?php } ?>
                </button>
            </div>
        <?php }
    }
}