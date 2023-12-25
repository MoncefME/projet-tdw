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
                <?php foreach ($brands as $brand) { ?>
                    <a href="/CarLog/brand/?id=<?php echo $brand['id']; ?>">
                        <img src="/CarLog/public/uploads/brands/<?php echo $brand['brandPicture'] ?>"
                            alt="<?php echo $brand['brandPicture'] ?>" width="50px" height="50px">
                        <span>
                            <?php echo $brand['name']; ?>
                        </span>
                    </a>
                <?php } ?>
            </div>
            <a id="show-more">Show more </a>
        </div>
        <?php
    }
}
