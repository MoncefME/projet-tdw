<?php
class SharedViews
{

    public function adminSideBar()
    {
        ?>
        <div class="admin-sidebar">
            <ul>
                <li><a href="/CarLog/admin/">Dashboard</a></li>
                <li><a href="/CarLog/admin/manageUsersPage/">Manage Users</a></li>
                <li><a href="/CarLog/admin/manageBrandsPage/">Manage Brands</a></li>
                <li><a href="/CarLog/admin/manageVehiculesPage/">Manage Vehicles</a></li>
                <li><a href="/CarLog/admin/manageBrandsReviewsPage/">Manage Brands Reviews</a></li>
                <li><a href="/CarLog/admin/manageVehiculesReviewsPage/">Manage Vehicules Reviews</a></li>
                <li><a href="/CarLog/admin/settings/">Settings</a></li>
            </ul>
        </div>
        <?php
    }
    public function Header()
    {
        ?>
        <header>
            <div class="logo">
                <img src="logo.png" alt="Logo">
            </div>
            <div class="user-actions">
                <?php if ($_SESSION['user']) { ?>
                    <a href="#">Logout</a>
                    <a href="#">Profile</a>
                <?php } else { ?>
                    <a href="#">Login</a>
                <?php } ?>
            </div>
        </header>
        <?php
    }

    public function Navbar()
    {
        ?>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Comparator</a></li>
                <li><a href="#">Brands</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Reviews</a></li>
            </ul>
        </nav>
        <?php
    }

    public function Sidebar()
    {
        ?>
        <div class="sidebar">
            <ul>
                <li><a href="#">Manage Users</a></li>
                <li><a href="#">Manage Brands</a></li>
                <li><a href="#">Manage Vehicles</a></li>
                <li><a href="#">Manage Reviews</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>
        <?php
    }
}
