<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/userController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/brandController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/views/sharedViews/sharedViews.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/views/userViews/brandsPage.php');
class HomePage
{
    public function showPage()
    {
        $brandsPage = new BrandsPage();
        ?>
        <div class="page__content">
            <?php
            $shardViews = new SharedViews();
            $shardViews->showHeader();
            $this->showSlider();
            $this->showNavBar();
            $brandsPage->showBrandsCards();
            $this->showComparator();
            $shardViews->showFooter();
            ?>
        </div>
        <?php
    }


    private function showSlider()
    {
        ?>
        <div class="homepage__slider">
            <!-- <img src="/CarLog/public/images/slider/background-1.jpg" alt="slider1">
            <img src="/CarLog/public/images/slider/background-2.jpg" alt="slider2">
            <img src="/CarLog/public/images/slider/background-3.jpg" alt="slider3"> -->
        </div>
        <?php
    }

    private function showNavBar()
    {
        ?>
        <div class="homepage__navbar">
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
        <?php
    }

    private function showComparator()
    {
        ?>
        <div class="homepage__comparator">
            <?php
            $comparatorPage = new ComparatorPage();
            $comparatorPage->showComparator();
            ?>
        </div>
        <?php
    }

}

