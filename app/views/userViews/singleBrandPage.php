<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/BrandController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/VehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandReviewsController.php");
class SingleBrandPage
{
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function showPage()
    {

        $shardViews = new SharedViews();
        $shardViews->showHeader();
        $this->showBrandInfo();
        $this->showBrandVehicles();
        $this->showBrandReviews();
        $this->showBrandReviewForm();
        $shardViews->showFooter();
    }
    private function showBrandInfo()
    {
        $brandController = new BrandController();
        $brand = $brandController->getBrandById($this->id);

        ?>
        <div class="header">
            <p>Name:
                <?php echo $brand['name']; ?>
            </p>
            <p>Origin Country:
                <?php echo $brand['originCountry']; ?>
            </p>
            <p>Headquarter:
                <?php echo $brand['headquarter']; ?>
            </p>
            <p>Year:
                <?php echo $brand['year']; ?>
            </p>
            <img src="/CarLog/public/uploads/brands/<?php echo $brand['brandPicture'] ?>"
                alt="<?php echo $brand['brandPicture'] ?>" width="50px" height="50px">
        </div>
        <?php
    }

    private function showBrandVehicles()
    {
        $vehiculeController = new VehiculeController();
        $vehicules = $vehiculeController->getVehiculesByBrand($this->id);

        ?>
        <h1>Vehicles</h1>
        <div class="vehicles">
            <?php
            foreach ($vehicules as $vehicule) {
                ?>
                <div class="vehicle-info">
                    <p>Model:
                        <?php echo $vehicule['model']; ?>
                    </p>
                    <p>Version:
                        <?php echo $vehicule['version']; ?>
                    </p>
                    <p>Year:
                        <?php echo $vehicule['year']; ?>
                    </p>
                    <img src="/CarLog/public/uploads/vehicules/<?php echo $vehicule['vehiculePicture'] ?>"
                        alt="<?php echo $vehicule['vehiculePicture'] ?>" width="50px" height="50px">
                    <a href="/CarLog/vehicule/?id=<?php echo $vehicule["id"] ?>"> Show Details </a>
                </div>
                <?php
            } ?>
        </div>
        <?php
    }

    public function showBrandReviews()
    {
        $brandReviewsController = new BrandReviewsController();
        $brandReviews = $brandReviewsController->getValidReviewsByBrand($this->id);
        ?>
        <h1>Reviews</h1>
        <div class="login-form">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Comment</th>
                        <th>Rating</th>
                        <!-- <th>Details</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($brandReviews as $review) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $review['comment']; ?>
                            </td>
                            <td>
                                <?php echo $review['rating']; ?>
                            </td>
                            <!-- <td><a href="/CarLog/review/?id=<?php echo $review["id"] ?>">Show Details</a></td> -->
                        </tr>
                        <?php
                    } ?>
                </tbody>
            </table>
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
        <form method="POST" action="/CarLog/app/api/reviews/brand/addReview.php?brandId=<?php echo $this->id ?>"
            class="login-form">
            <div>
                <?php $this->showReviewMessage(); ?>
                <div>
                    <label for="comment">Comment:</label>
                    <input type="text" name="comment" id="comment" placeholder="Enter comment" required>
                </div>

                <div>
                    <label for="rating">Rating:</label>
                    <input type="number" name="rating" id="rating" placeholder="Enter rating" required>
                </div>

                <div>
                    <button type="submit">Add Review</button>
                </div>
            </div>
        </form>
        <?php
    }


}











