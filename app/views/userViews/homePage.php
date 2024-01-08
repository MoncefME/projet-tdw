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
        $settingsController = new SettingsController();
        $sliderImages = $settingsController->getSliderImages();

        ?>
        <div class="homepage__slider">
            <div class="slider__container">
                <?php
                foreach ($sliderImages as $sliderImage) {
                    ?>
                    <a href="/CarLog/news/?id=<?php echo $sliderImage['news_id']; ?>">
                        <img src="<?= ImageUtility::getSliderImage($sliderImage) ?>" alt="" width="100" height="auto">
                    </a>
                    <?php
                }
                ?>
            </div>
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
            ?>
            <h1>Compare your car</h1>
            <p>Select minimum 2 distinct Cars</p>
            <?php
            $comparatorPage->showComparator();
            ?>
        </div>
        <?php
    }

}

