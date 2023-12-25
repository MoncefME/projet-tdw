<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class ManageReviewsPage
{
    public function showPage()
    {
        ?>
        <div class="page">
            <?php
            $sharedView = new SharedViews();
            $sharedView->adminSideBar();
            ?>
            <p>Manage Reviews (both)</p>
            <ul>
                <li><a href="/CarLog/admin/manageBrandsReviewsPage/">Manage Brands Reviews</a></li>
                <li><a href="/CarLog/admin/manageVehiculesReviewsPage/">Manage Vehicules Reviews</a></li>
            </ul>
        </div>
        <?php
    }

}