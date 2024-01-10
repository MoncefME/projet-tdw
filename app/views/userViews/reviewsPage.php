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
            // $shardViews->showNavBar();
            $this->showVehiculeReviewsLinks();
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

    public function showVehiculeReviewsLinks(){
        $vehiculeController = new VehiculeController();
        $vehicules = $vehiculeController->getAllVehicules();

        foreach($vehicules as $vehicule){
            ?>
            <a href="/CarLog/vehiculeReviews/?id=<?=$vehicule['id']?>"><?= $vehicule['model']?></a>
            <?php
        }
    }

}
