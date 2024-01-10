<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/userController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeReviewsController.php");
class SingleVehiculeReviewsPage
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
            <div class="vehicule__main__section-single">
                <?php
                    $this->showVehiculeInfo();
                ?>
                <div class="reviews__section-single">
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
        <div class="vehicule__information__container-single">
            <?= $this->showVehiculeLikeButton($vehicule); ?>
            <div>
                <img src="<?= ImageUtility::getVehiculePicture($vehicule); ?>" alt="<?= $vehicule['vehiculePicture'] ?>" width="400" height="auto">
            </div>
            <div>
                <h1><?= $vehicule['version'] . '-' . $vehicule['model'] . '-' . $vehicule['year']?></h1>
            </div>
        </div>
    <?php
    }


    public function showVehiculeReviews()
    {
        $vehiculeReviewsController = new VehiculeReviewsController();
        $vehiculeReviews = $vehiculeReviewsController->getValidReviewsByVehicule($this->id);
        $userController = new UserController();
    ?>
        <h1>Reviews</h1>
        <div class="reviews__table-single">
            <table class="table table-striped" >
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
