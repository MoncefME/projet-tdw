<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class ReviewsPage
{

    public function showPage()
    {
        $shardViews = new SharedViews();
?>
        <div class="page__content">
            <?php
            $shardViews->showHeader();
            $shardViews->showNavBar();
            $this->showBrandVehicles();
            $shardViews->showFooter();
            ?>
        </div>
    <?php
    }

    public static function showReviews()
    {
    ?>
        <div class="rating">
            <input value="5" name="rating" id="star5" type="radio">
            <label for="star5"></label>
            <input value="4" name="rating" id="star4" type="radio">
            <label for="star4"></label>
            <input value="3" name="rating" id="star3" type="radio">
            <label for="star3"></label>
            <input value="2" name="rating" id="star2" type="radio">
            <label for="star2"></label>
            <input value="1" name="rating" id="star1" type="radio">
            <label for="star1"></label>
        </div>
    <?php
    }

    private function showBrandVehicles()
    {
        $vehiculeController = new VehiculeController();
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $vehicules = $vehiculeController->getAllVehiculesWithRating();
        $totalPages = ceil(count($vehicules) / 6);
        $page = min($page, $totalPages);
        $croppedVehicle = array_slice($vehicules, ($page - 1) * 6, 6);

    ?>
        <div class="brand__vehicules__container">
            <div style="display: flex; gap: 20px;align-items:center">
                <?php if ($page > 1) : ?>
                    <a href="/CarLog/reviewsPage/?page=<?= $page - 1 ?>" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <?php endif; ?>

                <h1>Vehicles</h1>

                <?php if ($page < $totalPages) : ?>
                    <a href="/CarLog/reviewsPage/?page=<?= $page + 1 ?>" class="btn btn-primary">
                    <i class="fas fa-arrow-right"></i>
                </a>
                <?php endif; ?>
            </div>

            <div class="vehicles__list">
                <?php
                foreach ($croppedVehicle as $vehicule) {
                ?>
                    <div class="vehicle__info__card" style="position: relative;">
                        <a href="/CarLog/vehiculeReviews/?id=<?= $vehicule["id"] ?>">
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
                        <p style="position: absolute;bottom:15px;right:15px;">
                        <?php
                        $averageRating = $vehicule['average_rating'];
                        if ($averageRating >= 4.5) {
                            $starColor = 'gold'; 
                        } elseif ($averageRating >= 4) {
                            $starColor = 'green'; 
                        } elseif ($averageRating >= 3) {
                            $starColor = 'orange'; 
                        } else {
                            $starColor = 'gray'; 
                        }
                        ?>
                        <i class="fas fa-star" style="color: <?= $starColor ?>"></i>
                            <?= $averageRating ?>
                        </p>
                    </div>
                <?php
                } ?>
            </div>
        </div>
<?php
    }
}
