<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class AdminDashboardPage
{
    public function showPage()
    {
        ?>
        <div class="page">
            <?php
            $sharedView = new SharedViews();
            $sharedView->adminSideBar();
            ?>
            <h1>Admin Dashboard</h1>
            <?php
            $this->showLinks();
            ?>
        </div>
        <?php
    }

    public function showLinks()
    {
        ?>
        <div class="dashboard-links">
            <a href="/CarLog/admin/manageUsersPage/">
                <img src="/CarLog/public/icons/admin-dashboard/manage-users.png" alt="user" width="auto" height="200">
                <p>Manage User</p>
            </a>
            <a href="/CarLog/admin/manageBrandsPage/">
                <img src="/CarLog/public/icons/admin-dashboard/manage-brands.png" alt="brand" width="auto" height="200">
                <p>Manage Brands</p>
            </a>
            <a href="/CarLog/admin/manageVehiculesPage/">
                <img src="/CarLog/public/icons/admin-dashboard/manage-vehicules.png" alt="vehicule" width="auto" height="200">
                <p>Manage Vehicules </p>
            </a>
            <a href="/CarLog/admin/settings/">
                <img src="/CarLog/public/icons/admin-dashboard/settings.png" alt="settings" width="auto" height="200">
                <p>Settings</p>
            </a>
            <a href="/CarLog/admin/manageNewsPage/">
                <img src="/CarLog/public/icons/admin-dashboard/manage-news.png" alt="news" width="auto" height="200">
                <p>Manage News</p>
            </a>
            <a href="/CarLog/admin/manageReviewsPage/">
                <img src="/CarLog/public/icons/admin-dashboard/manage-reviews.png" alt="settings" width="auto" height="200">
                <p>Manage Reviews</p>
            </a>
        </div>
        <?php
    }
}

