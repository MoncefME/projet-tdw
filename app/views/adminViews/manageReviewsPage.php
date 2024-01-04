<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class ManageReviewsPage
{
    public function showPage()
    {
        $sharedView = new SharedViews();
        $vehiculeReviewsController = new VehiculeReviewsController();
        $notificationCountVehicule = $vehiculeReviewsController->getNumberOfPendingVehiculeReviews();
        $brandReviewsController = new BrandReviewsController();
        $notificationCountBrand = $brandReviewsController->getNumberOfPendingBrandReviews();
        ?>
        <div class="dashboard__page">
            <?php
            $sharedView->adminSideBar();
            ?>
            <div class="dashboard__content">
                <div class="dashboard__header-brands">
                    <h1>Manage Reviews</h1>
                </div>
                <div class="manage__reviews__links">
                    <div class="dashboard__link__card">
                        <a href="/CarLog/admin/manageBrandsReviewsPage/">
                            <?php $notificationCountBrand = $notificationCountBrand > 0 ? "<i class='fa-solid fa-bell fa-shake'></i>" : ""; ?>
                            <span class='notification__count'>
                                <?= $notificationCountBrand ?>
                            </span>
                            <img src="/CarLog/public/icons/admin-dashboard/brands-review.png" alt="Manage Brand Reviews">
                            <p>
                                Manage Brand Reviews
                            </p>
                        </a>
                    </div>
                    <div class="dashboard__link__card">
                        <a href="/CarLog/admin/manageVehiculesReviewsPage/">
                            <?php $notificationCountVehicule = $notificationCountVehicule > 0 ? "<i class='fa-solid fa-bell fa-shake'></i>" : ""; ?>
                            <span class='notification__count'>
                                <?= $notificationCountVehicule ?>
                            </span>
                            <img src="/CarLog/public/icons/admin-dashboard/vehicules-review.png" alt="Manage Vehicule Reviews">
                            <p>
                                Manage Vehicule Reviews
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

}