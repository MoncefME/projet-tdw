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
            <?= $guideAchat['content'] ?>
        </div>
        <?php
    }
}

