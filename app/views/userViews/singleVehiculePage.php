<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/userController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeReviewsController.php");
class SingleVehiculePage
{
    private $id;
    private $vehicule;
    public function __construct($id)
    {
        $this->id = $id;
        $vehiculeController = new VehiculeController();
        $this->vehicule = $vehiculeController->getVehiculeById($id);
        if ($this->vehicule == null) {
            header('Location: /CarLog/notFound');
        }
    }

    public function showPage()
    {
        $shardViews = new SharedViews();
?>
        <div class="page__content">
            <?= $shardViews->showHeader(); ?>
            <?= $shardViews->showNavBar(); ?>
            <div class="vehicule__main__section">
                <?php
                $this->showVehiculeInfo();
                ?>
                <div class="reviews__section">
                    <?= $this->showVehiculeReviews(); ?>
                </div>
            </div>
            <?= $shardViews->showFooter(); ?>
        </div>
    <?php
    }

    public function showVehiculeInfo()
    {
        $vehicule = $this->vehicule;

    ?>
        <div class="vehicule__information__container">
            <?= $this->showVehiculeLikeButton($vehicule); ?>
            <div style="position :relative">
                <a href="/CarLog/brand/?id=<?= $vehicule['brand_id'] ?>" style="position:absolute;left:5px;bottom:5px;font-weight:bold;color:black; background-color:white;border-radius:5px;padding:0 5px;">
                    <i class="fa-solid fa-house"></i>
                    Brand
                </a>
                <a href="/CarLog/comparision/?idA=<?= $vehicule['id'] ?>" style="position:absolute;right:5px;bottom:5px;font-weight:bold;color:black; background-color:white;border-radius:5px;padding:0 5px;">
                    Compare
                    <i class="fa-solid fa-code-compare"></i>
                </a>
                <img src="<?= ImageUtility::getVehiculePicture($vehicule); ?>" alt="<?= $vehicule['vehiculePicture'] ?>" width="400" height="auto">
            </div>
            <div>
                <div class="information-grid">
                    <div class="vehicule__information__card">
                        <p>
                            <i class="fa-solid fa-car"></i>
                            Model: <?= $vehicule['model'] ?>
                        </p>
                    </div>
                    <div class="vehicule__information__card">
                        <p>
                            <i class="fas fa-car-side"></i>
                            Version: <?= $vehicule['version'] ?>
                        </p>
                    </div>
                    <div class="vehicule__information__card">
                        <p>
                            <i class="fas fa-calendar-alt"></i>
                            Year: <?= $vehicule['year'] ?>
                        </p>
                    </div>
                    <div class="vehicule__information__card">
                        <p>
                            <i class="fas fa-ruler-horizontal"></i>
                            Length: <?= $vehicule['length'] ?>
                        </p>
                    </div>
                    <div class="vehicule__information__card">
                        <p>
                            <i class="fas fa-ruler-horizontal"></i>
                            Width: <?= $vehicule['width'] ?>
                        </p>
                    </div>
                    <div class="vehicule__information__card">
                        <p>
                            <i class="fas fa-ruler-horizontal"></i>
                            Height: <?= $vehicule['height'] ?>

                        </p>
                    </div>
                    <div class="vehicule__information__card">
                        <p>
                            <i class="fas fa-ruler-horizontal"></i>
                            Wheel Base: <?= $vehicule['wheelBase'] ?>
                        </p>
                    </div>
                    <div class="vehicule__information__card">
                        <p>
                            <i class="fas fa-cogs"></i>
                            Engine: <?= $vehicule['engine'] ?>
                        </p>
                    </div>
                    <div class="vehicule__information__card">
                        <p>
                            <i class="fas fa-tachometer-alt"></i>
                            Performance: <?= $vehicule['performance'] ?>

                        </p>
                    </div>
                    <div class="vehicule__information__card">
                        <p>
                            <i class="fas fa-dollar-sign"></i>
                            Price:
                            <?= $vehicule['price'] ?>
                        </p>
                    </div>
                    <div class="vehicule__information__card">

                        <p>
                            <i class="fas fa-gas-pump"></i>
                            Consumption: <?= $vehicule['consumption'] ?>

                        </p>
                    </div>
                    <div class="vehicule__information__card">
                        <p>
                            <i class="fa-solid fa-comment"></i>
                            Note: <?= $vehicule['note'] ?>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    <?php
    }


    public function showVehiculeReviews()
    {
        $vehiculeReviewsController = new VehiculeReviewsController();
        $vehiculeReviews = $vehiculeReviewsController->getTopVehiculeReviews($this->id);
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
                                <img src="<?= ImageUtility::getUserProfilePicture($user) ?>" alt="user profile picture" width="50px" height="50px" style="border-radius:100%;">
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
            if (count($vehiculeReviews) == 0) {
            ?>
                <div class="review-message">
                    <p>No reviews yet</p>
                </div>
            <?php
            }
            ?>
            <a href="/CarLog/vehiculeReviews/?id=<?= $this->id ?>">See more reviews</a>
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
            <form method="POST" action="/CarLog/app/api/reviews/vehicule/addReview.php?vehiculeId=<?php echo $this->id ?>" class="login-form">
                <div>
                    <div class="comment__input">
                        <input type="text" name="comment" id="comment" placeholder="Enter comment" required>
                    </div>
                    <?= ReviewsPage::showReviews(); ?>
                    <div>
                        <button type="submit" class="btn btn-info">Add Review</button>
                        <?= $this->showReviewMessage(); ?>
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
                <button onclick="addFavoriteVehicule(<?php echo $_SESSION['USER']['id']; ?>, <?php echo $vehicule['id']; ?>)" class="<?php echo $isLiked ? 'liked' : '' ?>">
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
