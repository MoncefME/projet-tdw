<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/BrandController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/VehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandReviewsController.php");
class SingleBrandPage
{
    private $id;
    private $brand;

    public function __construct($id)
    {
        $this->id = $id;
        $brandController = new BrandController();
        $this->brand = $brandController->getBrandById($id);
        if ($this->brand == null) {
            header('Location: /CarLog/notFound');
        }
    }


    public function showPage()
    {
        $shardViews = new SharedViews();
?>
        <div class="page__content">
            <?php
            $shardViews->showHeader();
            $shardViews->showNavBar();
            $this->showBrandInfo();
            ?>
            <div class="vehicule__main__section">
                <?php
                $this->showBrandVehicles();
                $this->showBrandReviews();
                ?>
            </div>
            <?php
            $shardViews->showFooter();
            ?>
        </div>
    <?php
    }
    private function showBrandInfo()
    {

        $brand = $this->brand;

    ?>
        <div class="brand__information__container">
            <div>
                <img src="<?= ImageUtility::getBrandLogo($brand) ?>" alt="<?php echo $brand['brandPicture'] ?>" width="150" height="auto">
            </div>
            <div>
                <div class="brand__information__summary">
                    <p>
                        <i class="fas fa-car-side"></i>
                        <b>Name:</b>
                        <?= $brand['name']; ?>
                    </p>
                    <p>
                        <i class="fas fa-globe-americas"></i>
                        <b>Country:</b>
                        <?= $brand['originCountry']; ?>
                    </p>
                    <p>
                        <i class="fas fa-building"></i>
                        <b>Headquarter:</b>
                        <?= $brand['headquarter']; ?>
                    </p>
                    <p>
                        <i class="fas fa-calendar-alt"></i>
                        <?= $brand['year']; ?>
                    </p>
                </div>
                <p>
                    <?= $brand['description']; ?>
                </p>
            </div>

        </div>
    <?php
    }

    private function showBrandVehicles()
    {
        $vehiculeController = new VehiculeController();
        $vehicules = $vehiculeController->getVehiculesByBrand($this->id);
    ?>
        <div class="brand__vehicules__container">
            <h1>Vehicles</h1>
            <div class="vehicles__list">
                <?php
                foreach ($vehicules as $vehicule) {
                ?>
                    <div class="vehicle__info__card">
                        <a href="/CarLog/vehicule/?id=<?= $vehicule["id"] ?>">
                            <img src="<?= ImageUtility::getVehiculePicture($vehicule); ?>" alt="<?php echo $vehicule['vehiculePicture'] ?>" width="100%" height="auto" style="border-radius: 5px;">
                        </a>
                        <p>
                            <b>Model:</b>
                            <?= $vehicule['model']; ?>
                        </p>
                        <p>
                            <b>Version:</b>
                            <?= $vehicule['version']; ?>
                        </p>
                        <p>
                            <b>Year:</b>
                            <?= $vehicule['year']; ?>
                        </p>
                    </div>
                <?php
                } ?>
            </div>
        </div>
    <?php
    }

    public function showBrandReviews()
    {
        $brandReviewsController = new BrandReviewsController();
        $brandReviews = $brandReviewsController->getValidReviewsByBrand($this->id);
        $userController = new UserController();
    ?>
        <div class="reviews__section">
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
                        foreach ($brandReviews as $review) {
                            $user = $userController->getUserById($review['user_id']);
                        ?>
                            <tr>
                                <td>
                                    <img src="<?= ImageUtility::getUserProfilePicture($user) ?>" alt="user profile picture" width="50px" height="50px">
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
            </div>
            <?php
            if (isset($_SESSION['USER']) && $_SESSION['USER']['role'] != 'GUEST') {
                $this->showBrandReviewForm();
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

    public function showBrandReviewForm()
    {
    ?>
        <div class="add__review__form">
            <form method="POST" action="/CarLog/app/api/reviews/brand/addReview.php?brandId=<?php echo $this->id ?>">
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
}
