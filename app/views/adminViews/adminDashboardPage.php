<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class AdminDashboardPage
{
    public function showPage()
    {
        $sharedView = new SharedViews();
        ?>
        <div class="dashboard__page">
            <?php
            $sharedView->adminSideBar();
            ?>
            <div class="dashboard__content">
                <h1>Admin Dashboard</h1>
                <?php
                $this->showLinks();
                ?>
            </div>
        </div>
        <?php
    }

    public function showLinks()
    {
        ?>
        <div class="dashboard__links">
            <?php
            foreach ($this->linksData as $link) {
                $this->showLinkCard($link);
            }
            ?>
        </div>
        <?php
    }

    private function showLinkCard($Link)
    {
        ?>
        <div class="dashboard__link__card">
            <a href="<?= $Link['url'] ?>">
                <img src="<?= $Link['img'] ?>" alt="<?= $Link['alt'] ?>">
                <p>
                    <?= $Link['text'] ?>
                </p>
            </a>
        </div>
        <?php
    }

    private $linksData = [
        [
            "url" => ApiRouter::ADMIN_MANAGE_USERS_URL,
            "img" => "/CarLog/public/icons/admin-dashboard/manage-users.png",
            "alt" => "user",
            "text" => "Manage User"
        ],
        [
            "url" => ApiRouter::ADMIN_MANAGE_NEWS_URL,
            "img" => "/CarLog/public/icons/admin-dashboard/manage-news.png",
            "alt" => "news",
            "text" => "Manage News"
        ],
        [
            "url" => ApiRouter::ADMIN_MANAGE_BRANDS_URL,
            "img" => "/CarLog/public/icons/admin-dashboard/manage-brands.png",
            "alt" => "brand",
            "text" => "Manage Brands"
        ],
        [
            "url" => ApiRouter::ADMIN_MANAGE_VEHICULES_URL,
            "img" => "/CarLog/public/icons/admin-dashboard/manage-vehicules.png",
            "alt" => "vehicule",
            "text" => "Manage Vehicules"
        ],
        [
            "url" => ApiRouter::ADMIN_SETTINGS_URL,
            "img" => "/CarLog/public/icons/admin-dashboard/settings.png",
            "alt" => "settings",
            "text" => "Settings"
        ],
        [
            "url" => ApiRouter::ADMIN_MANAGE_REVIEWS_URL,
            "img" => "/CarLog/public/icons/admin-dashboard/manage-reviews.png",
            "alt" => "settings",
            "text" => "Manage Reviews"
        ]
    ];
}

