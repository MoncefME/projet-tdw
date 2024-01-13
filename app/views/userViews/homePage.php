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
            $comparatorPage = new ComparatorPage();
            $shardViews->showHeader();
            $this->showSlider();
            $shardViews->showNavBar();
            $brandsPage->showBrandsCards();
            $this->showComparator();
            $comparatorPage->showPopularComparisons();
            $shardViews->showFooter();
            ?>
        </div>
        <?php
    }


    private function showSlider()
    {
        ?>
        <div class="homepage__slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $settingsController = new SettingsController();
                    $sliderImages = $settingsController->getSliderImages();
                    $i = 0;
                    foreach ($sliderImages as $sliderImage) {
                        ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? 'active' : ''; ?>"></li>
                        <?php
                        $i++;
                    }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    foreach ($sliderImages as $sliderImage) {
                        ?>
                        <div class="carousel-item <?php echo $i == 0 ? 'active' : ''; ?>">
                            <a href="/CarLog/news/?id=<?php echo $sliderImage['news_id']; ?>">
                                <p class="slider__title"><?php echo $sliderImage['title']; ?></p>
                                <img class="d-block w-100" src="<?= ImageUtility::getSliderImage($sliderImage) ?>" alt="Slide">
                            </a>
                        </div>
                        <?php
                        $i++;
                    }
                    ?>
                </div>
            </div>
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

