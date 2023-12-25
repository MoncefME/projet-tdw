<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/userController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/brandController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/views/sharedViews/sharedViews.php');
class HomePage
{
    public function showPage()
    {
        $shardViews = new SharedViews();
        $shardViews->showHeader();
        $this->showSlider();
        $this->showNavBar();
        $this->showBrandsCards();
        $this->showComparator();
        $shardViews->showFooter();
    }


    private function showSlider()
    {
        ?>
        <div class="slider">
            <p>This is a slider</p>
        </div>
        <?php
    }

    private function showNavBar()
    {
        ?>
        <div class="navbar">
            <ul>
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
        <div class="comparator">
            <p>This is a Comparator</p>
        </div>
        <?php
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

