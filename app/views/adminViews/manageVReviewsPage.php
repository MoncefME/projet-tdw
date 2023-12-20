<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class ManageVReviewsPage
{
    public function showPage()
    {
        ?>
        <div class="page">
            <?php
            $sharedView = new SharedViews();
            $sharedView->adminSideBar();
            ?>
            <p>Manage Vehicle Reviews</p>
        </div>
        <?php
    }
}
