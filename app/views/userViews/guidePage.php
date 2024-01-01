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
            echo "guid page";
            $shardViews->showFooter();
            ?>
        </div>
        <?php
    }
}
