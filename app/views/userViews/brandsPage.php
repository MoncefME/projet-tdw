<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class BrandsPage
{

    public function showPage()
    {
        $shardViews = new SharedViews();
        ?>
        <div class="page__content">
            <?php
            $shardViews->showHeader();
            $this->showBrandsCards();
            $shardViews->showFooter();
            ?>
        </div>
        <?php
    }

    public function showBrandsCards()
    {
        $brandController = new BrandController();
        $brands = $brandController->getAllBrands();
        ?>
        <div class="brands__view__container">
            <div class="brands__view__title">
                <h1>Brands</h1>
                <p>Choose a brand </p>
            </div>
            <div class="brand__grid">
                <?php
                if (count($brands) > 8) {
                    $newBrands = array_slice($brands, 0, 8);
                } else {
                    $newBrands = $brands;
                }
                foreach ($newBrands as $brand) {
                    $this->showBrandCard($brand);
                } ?>
                <div id="hiddenBrands" style="display: none;">
                    <?php
                    $remainingBrands = array_slice($brands, 8);
                    foreach ($remainingBrands as $brand) {
                        $this->showBrandCard($brand);
                    }
                    ?>
                </div>
            </div>
            <a id="show-more" onclick="toggleHiddenBrands()">Show more</a>
        </div>
        <?php
    }

    private function showBrandCard($brand)
    {
        ?>
        <div class="brand__card">
            <a href="<?= ApiRouter::BRAND_URL($brand['id']) ?>">
                <img src="<?= ImageUtility::getBrandLogo($brand) ?>" alt="<?= $brand['brandPicture'] ?>" width="50px"
                    height="50px">
                <span>
                    <?php echo $brand['name']; ?>
                </span>
            </a>
        </div>
        <?php
    }
}
