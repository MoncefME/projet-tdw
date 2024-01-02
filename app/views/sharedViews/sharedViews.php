<?php
class SharedViews
{

    public function adminSideBar()
    {
        ?>
        <div class="dashboard__sidebar">
            <div class="dashboard__sidebar__logo">
                <a href="/CarLog/">
                    <img src="<?= CARLOG_LOGO_WHITE ?>" alt="CarLog Logo">
                </a>
            </div>
            <div class="dashboard__sidebar__menu">
                <ul>
                    <?php
                    foreach ($this->sidebarLinks as $link) {
                        ?>
                        <li class="<?= ($_SERVER['REQUEST_URI'] === $link['link']) ? 'active' : '' ?>">
                            <a href="<?= $link['link'] ?>">
                                <img src="<?= $link['icon'] ?>" alt="icon">
                                <span>
                                    <?= $link['text'] ?>
                                </span>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
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

    private $sidebarLinks = [
        [
            'link' => '/CarLog/admin/',
            'icon' => '/CarLog/public/icons/admin-dashboard/dashboard.png',
            'text' => 'Dashboard'
        ],
        [
            'link' => '/CarLog/admin/manageUsersPage/',
            'icon' => '/CarLog/public/icons/admin-dashboard/manage-users.png',
            'text' => 'Manage Users'
        ],
        [
            'link' => '/CarLog/admin/manageBrandsPage/',
            'icon' => '/CarLog/public/icons/admin-dashboard/manage-brands.png',
            'text' => 'Manage Brands'
        ],
        [
            'link' => '/CarLog/admin/manageVehiculesPage/',
            'icon' => '/CarLog/public/icons/admin-dashboard/manage-vehicules.png',
            'text' => 'Manage Vehicules'
        ],
        [
            'link' => '/CarLog/admin/manageReviewsPage/',
            'icon' => '/CarLog/public/icons/admin-dashboard/manage-reviews.png',
            'text' => 'Manage Reviews'
        ],
        [
            'link' => '/CarLog/admin/manageNewsPage/',
            'icon' => '/CarLog/public/icons/admin-dashboard/manage-news.png',
            'text' => 'Manage News'
        ],
        [
            'link' => '/CarLog/admin/settings/',
            'icon' => '/CarLog/public/icons/admin-dashboard/settings.png',
            'text' => 'Settings'
        ],
        [
            'link' => '/CarLog/app/api/auth/logout.php',
            'icon' => '/CarLog/public/icons/admin-dashboard/logout.png',
            'text' => 'Logout'
        ]
    ];

    public function showHeader()
    {
        ?>
        <div class="page__header">
            <div class="page__header__logo">
                <a href="/CarLog/">
                    <img src="<?= CARLOG_LOGO ?>" alt="logo" width="200" height="auto">
                </a>
            </div>
            <div class="header__socialmedia">
                <?php $this->showSocialMedia(); ?>
            </div>
            <div class="header__login">
                <?php if (isset($_SESSION['USER'])) { ?>
                    <a href="/CarLog/app/api/auth/logout.php" class="btn btn-danger">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                    <a href="/CarLog/profilePage/" class="btn btn-secondary">
                        <i class="fas fa-user"></i>
                        Profile
                    </a>
                    <?php if ($_SESSION['USER']['role'] === 'ADMIN') { ?>
                        <a href="/CarLog/admin/" class="btn btn-primary">
                            <i class="fas fa-user-shield"></i>
                            Admin
                        </a>
                    <?php } ?>
                <?php } else { ?>
                    <a href="/CarLog/loginPage/" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i>
                        Login
                    </a>
                <?php } ?>
            </div>
        </div>
        <?php
    }

    private function showSocialMedia()
    {
        foreach ($this->linksData as $linkData) {
            ?>
            <a href="<?= $linkData['link']; ?>" target="_blank">
                <img src="<?= $linkData['icon']; ?>" alt="social media icon" width="25px">
            </a>
            <?php
        }
    }

    public function showFooter()
    {
        ?>
        <div class="page__footer">
            <div class="page__footer__links">
                <ul>
                    <li><a href="/CarLog/">Home</a></li>
                    <li><a href="/CarLog/brandsPage/">Brands</a></li>
                    <li><a href="/CarLog/comparatorPage/">Comparator</a></li>
                    <li><a href="/CarLog/newsPage/">News</a></li>
                    <li><a href="/CarLog/guidePage/">Guide d'achat</a></li>
                    <li><a href="/CarLog/contactPage/">Contact</a></li>
                    <li><a href="/CarLog/reviewsPage/">Reviews</a></li>
                </ul>
            </div>
            <div class="footer__socialmedia">
                <?php $this->showSocialMedia(); ?>
            </div>
            <p> All rights reserved to &copy;<img src="<?= CARLOG_LOGO_WHITE ?>" alt="CarLog Logo" width="80" height="auto">
            </p>
        </div>
        <?php
    }
}
