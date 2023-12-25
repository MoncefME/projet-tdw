<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/userController.php');
class HomePage
{
    private $linksData = [
        [
            'link' => 'https://www.facebook.com/moncef.moussaoui.79/',
            'icon' => '<i class="fa-brands fa-facebook fa-xl"></i>',
        ],
        [
            'link' => 'https://www.linkedin.com/in/abdelmouncif-moussaoui-35021a206/',
            'icon' => '<i class="fa-brands fa-linkedin fa-xl"></i>',
        ],
        [
            'link' => 'https://www.instagram.com/moncefon/',
            'icon' => '<i class="fa-brands fa-instagram fa-xl"></i>',
        ],
        [
            'link' => 'https://www.youtube.com/channel/UC28Px5uPpW3jNVyIe6E2vQw',
            'icon' => '<i class="fa-brands fa-youtube fa-xl"></i>',
        ]
    ];

    public function showPage()
    {
        $this->showHeader();
        $this->showSlider();
        $this->showNavBar();
        $this->showComparator();
        $this->showFooter();
    }

    private function showHeader()
    {
        ?>
        <div class="header">
            <div class="header-logo">
                <img src="/CarLog/public/icons/logos/Black logo - no background.png" alt="logo" width="200" height="auto">
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
                <?php echo $linkData['icon']; ?>
            </a>
            <?php
        }
    }

    private function showSlider()
    {
        ?>
        <div class="slider">
            <p>This is a slider</p>
        </div>
        <?php
    }

    private function showNavBar()
    {
        ?>
        <div class="navbar">
            <ul>
                <li><a href="/CarLog/brandsPage/">Brands</a></li>
                <li><a href="/CarLog/comparatorPage/">Comparator</a></li>
                <li><a href="/CarLog/newsPage/">News</a></li>
                <li><a href="/CarLog/brandsPage/">Guide d'achat</a></li>
                <li><a href="/CarLog/contactPage/">Contact</a></li>
                <li><a href="/CarLog/reviewsPage/">Reviews</a></li>
            </ul>
        </div>
        <?php
    }

    private function showComparator()
    {
        ?>
        <div class="comparator">
            <p>This is a Comparator</p>
        </div>
        <?php
    }

    private function showFooter()
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
                    <li><a href="/CarLog/brandsPage/">Guide d'achat</a></li>
                    <li><a href="/CarLog/contactPage/">Contact</a></li>
                    <li><a href="/CarLog/reviewsPage/">Reviews</a></li>
                </ul>
            </div>
            <p> &copy; 2023 CarLog</p>
        </div>
        <?php
    }
}

