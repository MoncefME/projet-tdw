<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class GuidePage
{
    public function showPage()
    {

        $shardViews = new SharedViews();
        $shardViews->showHeader();
        echo 'GuidePage';
        $shardViews->showFooter();
    }
}
