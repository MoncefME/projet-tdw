<?php
class SharedViews
{

    public function adminSideBar()
    {
        ?>
        <div class="admin-sidebar">
            <div class="header-logo">
                <a href="/CarLog/">
                    <img src="/CarLog/public/icons/logos/Black logo - no background.png" alt="logo" width="200" height="auto">
                </a>
            </div>
            <ul>
                <li>
                    <a href="/CarLog/admin/">
                        Dashboard
                        <img src="/CarLog/public/icons/admin-dashboard/dashboard.png" width="25px">
                    </a>
                </li>
                <li>
                    <a href="/CarLog/admin/manageUsersPage/">
                        Manage Users
                        <img src="/CarLog/public/icons/admin-dashboard/manage-users.png" width="25px">
                    </a>
                </li>
                <li>
                    <a href="/CarLog/admin/manageBrandsPage/">
                        Manage Brands
                        <img src="/CarLog/public/icons/admin-dashboard/manage-brands.png" width="25px">
                    </a>
                </li>
                <li>
                    <a href="/CarLog/admin/manageVehiculesPage/">
                        Manage Vehicules
                        <img src="/CarLog/public/icons/admin-dashboard/manage-vehicules.png" width="25px">
                    </a>
                </li>
                <li>
                    <a href="/CarLog/admin/manageReviewsPage/">
                        Manage Reviews
                        <img src="/CarLog/public/icons/admin-dashboard/manage-reviews.png" width="25px">
                    </a>
                </li>
                <li>
                    <a href=" /CarLog/admin/settings/">
                        Settings
                        <img src="/CarLog/public/icons/admin-dashboard/settings.png" width="25px">
                    </a>
                </li>
                <li>
                    <a href="/CarLog/admin/manageNewsPage/">
                        Manage News
                        <img src="/CarLog/public/icons/admin-dashboard/manage-news.png" width="25px">
                    </a>
                </li>
            </ul>
            <ul>
                <li><a href="/CarLog/app/api/auth/logout.php">Logout</a></li>
            </ul>
        </div>
        <?php
    }
    private $linksData = [
        [
            'link' => 'https://www.facebook.com/moncef.moussaoui.79/',
            'icon' => '/CarLog/public/icons/social-media/facebook.png',
        ],
        [
            'link' => 'https://www.linkedin.com/in/abdelmouncif-moussaoui-35021a206/',
            'icon' => '/CarLog/public/icons/social-media/linkedin.png',
        ],
        [
            'link' => 'https://www.instagram.com/moncefon/',
            'icon' => '/CarLog/public/icons/social-media/instagram.png',
        ],
        [
            'link' => 'https://www.youtube.com/channel/UC28Px5uPpW3jNVyIe6E2vQw',
            'icon' => '/CarLog/public/icons/social-media/twitter.png',
        ]
    ];

    public function showHeader()
    {
        ?>
        <div class="header">
            <div class="header-logo">
                <a href="/CarLog/">
                    <img src="/CarLog/public/icons/logos/Black logo - no background.png" alt="logo" width="200" height="auto">
                </a>
            </div>
            <div class="header__social-media">
                <?php $this->showSocialMedia(); ?>
            </div>
            <div class="header__login">
                <?php if (isset($_SESSION['USER'])) { ?>
                    <a href="/CarLog/app/api/auth/logout.php" class="btn btn-danger">Logout</a>
                    <a href="/CarLog/profilePage/" class="btn btn-secondary">Profile</a>
                    <?php if ($_SESSION['USER']['role'] === 'ADMIN') { ?>
                        <a href="/CarLog/admin/" class="btn btn-primary">Dashboard</a>
                    <?php } ?>
                <?php } else { ?>
                    <a href="/CarLog/loginPage/" class="btn btn-primary">Log In</a>
                <?php } ?>
            </div>
        </div>
        <?php
    }

    private function showSocialMedia()
    {
        foreach ($this->linksData as $linkData) {
            ?>
            <a href="<?php echo $linkData['link']; ?>" target="_blank">
                <img src="<?php echo $linkData['icon']; ?>" alt="social media icon" width="30px">
            </a>
            <?php
        }
    }

    public function showFooter()
    {
        ?>
        <div class="footer">
            <div>
                <?php $this->showSocialMedia(); ?>
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="/CarLog/brandsPage/">Brands</a></li>
                    <li><a href="/CarLog/comparatorPage/">Comparator</a></li>
                    <li><a href="/CarLog/newsPage/">News</a></li>
                    <li><a href="/CarLog/guidePage/">Guide d'achat</a></li>
                    <li><a href="/CarLog/contactPage/">Contact</a></li>
                    <li><a href="/CarLog/reviewsPage/">Reviews</a></li>
                </ul>
            </div>
            <p> &copy; 2023 CarLog</p>
        </div>
        <?php
    }
}
