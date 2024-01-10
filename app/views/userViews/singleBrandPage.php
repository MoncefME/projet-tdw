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
            // $shardViews->showNavBar();
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
        // $brandController = new BrandController();
        // $brand = $brandController->getBrandById($this->id);
        $brand = $this->brand;

        ?>
        <div class="brand__information__container">
            <div>
                <img src="<?= ImageUtility::getBrandLogo($brand) ?>" alt="<?php echo $brand['brandPicture'] ?>" width="150"
                    height="auto">
            </div>
            <div>
                <div class="brand__information__summary">
                    <p>Name:
                        <?= $brand['name']; ?>
                    </p>
                    <p>Origin Country:
                        <?= $brand['originCountry']; ?>
                    </p>
                    <p>Headquarter:
                        <?= $brand['headquarter']; ?>
                    </p>
                    <p>Year:
                        <?= $brand['year']; ?>
                    </p>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo delectus earum, natus saepe mollitia,
                    accusamus
                    vero voluptatum quasi maxime aliquam laborum tempore quas, repudiandae laboriosam ad est beatae
                    similique
                    placeat?
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
                        <p>Model:
                            <?= $vehicule['model']; ?>
                        </p>
                        <p>Version:
                            <?= $vehicule['version']; ?>
                        </p>
                        <p>Year:
                            <?= $vehicule['year']; ?>
                        </p>
                        <img src="<?= ImageUtility::getVehiculePicture($vehicule); ?>"
                            alt="<?php echo $vehicule['vehiculePicture'] ?>" width="100px" height="auto">
                        <a href="/CarLog/vehicule/?id=<?= $vehicule["id"] ?>"> Show Details </a>
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
                                    <img src="<?= ImageUtility::getUserProfilePicture($user) ?>" alt="user profile picture"
                                        width="50px" height="50px">
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











