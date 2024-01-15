<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");

class EditBrandPage
{
    private $id;
    private $brand;
    public function __construct($id)
    {
        $this->id = $id;
        $brandController = new BrandController();
        $this->brand = $brandController->getBrandById($id);
        if ($this->brand == null) {
            header('Location: /CarLog/notFound');
        }
    }
    public function showPage()
    {
        $sharedView = new SharedViews();
        ?>
        <div class="dashboard__page">
            <?php
            $sharedView->adminSideBar();
            ?>
            <div class="dashboard__content">
                <div class="dashboard__header-brands">
                    <h1>Edit Brand </h1>
                </div>
                <?php
                $this->showBrandForm();
                ?>
            </div>
        </div>
        <?php
    }

    private function showBrandForm()
    {
        $brand = $this->brand;
        ?>
        <div class="brands__form" id="brandForm">
            <form method="POST" action="<?= ApiRouter::EDIT_BRAND_ENDPOINT($brand['id']) ?>" enctype="multipart/form-data">
                <div class="brands__form__inputs__container">
                    <div>
                        <label for="name">Brand Name:</label>
                        <input type="text" name="name" id="name" placeholder="Enter brand name" required
                            value="<?php echo $brand['name'] ?>">
                    </div>
                    <div>
                        <label for="originCountry">Origin Country:</label>
                        <input type="text" name="originCountry" id="originCountry" placeholder="Enter origin country" required
                            value="<?php echo $brand['originCountry'] ?>">
                    </div>
                    <div>
                        <label for="headquarter">Headquarter:</label>
                        <input type="text" name="headquarter" id="headquarter" placeholder="Enter headquarter" required
                            value="<?php echo $brand['headquarter'] ?>">
                    </div>
                    <div>
                        <label for="year">Year Established:</label>
                        <input type="number" name="year" id="year" placeholder="Enter year" required
                            value="<?php echo $brand['year'] ?>">
                    </div>
                    <div class="two__columns">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" placeholder="Enter description" required><?php echo $brand['description'] ?></textarea>
                    </div>
                    <div>
                        <label for="brandPicture">Brand Picture:</label>
                        <input type="file" name="brandPicture" id="brandPicture" accept="image/*"
                            onChange="previewInputImage(event)">
                        <input type="hidden" name="currentPicture" value="<?php echo $brand['brandPicture'] ?>">
                        <img id="previewImage" src="<?= ImageUtility::getBrandLogo($brand) ?>" alt="Preview"
                            style="width: 100px; height: 100px;">
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">
                    <span> Edit Brand</span>
                </button>
            </form>
        </div>
        <?php
    }
}











