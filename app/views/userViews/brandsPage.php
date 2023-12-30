<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class BrandsPage
{
    public function showPage()
    {
        $shardViews = new SharedViews();
        $shardViews->showHeader();
        $this->showBrandsCards();
        $shardViews->showFooter();
    }

    private function showBrandsCards()
    {
        $brandController = new BrandController();
        $brands = $brandController->getAllBrands();
        ?>
        <div>
            <div class="brands-title">
                <h1>Brands</h1>
                <p>Choose a brand </p>
            </div>
            <div class="brands-grid">
                <?php foreach ($brands as $brand) {
                    $this->showBrandCard($brand);
                } ?>
            </div>
            <a id="show-more">Show more </a>
        </div>
        <?php
    }

    private function showBrandCard($brand)
    {
        ?>
        <a href="/CarLog/brand/?id=<?php echo $brand['id']; ?>">
            <img src="<?= ImageUtility::getBrandLogo($brand) ?>" alt="<?php echo $brand['brandPicture'] ?>" width="50px"
                height="50px">
            <span>
                <?php echo $brand['name']; ?>
            </span>
        </a>
        <?php
    }
}
