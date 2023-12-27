<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeReviewsController.php");
class SingleVehiculePage
{
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function showPage()
    {

        $sharedViews = new SharedViews();
        $sharedViews->showHeader();
        $this->showInfoTable();
        $this->showVehiculeReviews();
        if (isset($_SESSION['USER']) && $_SESSION['USER']['role'] != 'GUEST') {
            $this->showVehiculeReviewForm();
        } else {
            ?>
            <div class="review-message">
                <p>You must be logged in to add a review</p>
            </div>
            <?php
        }
        $sharedViews->showFooter();

    }


    public function showInfoTable()
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
        ?>
        <h1>Reviews</h1>
        <div class="login-form">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Comment</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($vehiculeReviews as $review) {
                        ?>
                        <tr>
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
        <form method="POST" action="/CarLog/app/api/reviews/vehicule/addReview.php?vehiculeId=<?php echo $this->id ?>"
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