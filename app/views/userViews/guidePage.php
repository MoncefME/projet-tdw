<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class GuidePage
{

    public function showPage()
    {
        $shardViews = new SharedViews();
?>
        <div class="page__content">
            <?php
            $shardViews->showHeader();
            $shardViews->showNavBar();
            $this->showGuideAchat();
            $shardViews->showFooter();
            ?>
        </div>
    <?php
    }
    public function showGuideAchat()
    {
        $settingsController = new SettingsController();
        $guideAchat = $settingsController->getGuideAchat();
    ?>
        <div class="guide_achat__container">
            <img src="/CarLog/public/images/buyer-guide.jpg" width="100%" height="auto">
            <h2><?= $guideAchat['title'] ?></h2>
            <p style="white-space: break-spaces">
                <?= $guideAchat['content'] ?>
            </p>
        </div>
<?php
    }
}
