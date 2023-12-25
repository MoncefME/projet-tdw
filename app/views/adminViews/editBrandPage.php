<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");

class EditBrandPage
{
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function showPage()
    {
        ?>
        <div class="page">
            <p>Edit Brand
                <?php echo $this->id; ?> Page
            </p>
            <?php
            $sharedView = new SharedViews();
            $sharedView->adminSideBar();
            $this->showBrandForm();
            ?>
        </div>
        <?php
    }

    private function showBrandForm()
    {
        $brandController = new BrandController();
        $brand = $brandController->getBrandById($this->id);
        ?>
        <form method="POST" action="/CarLog/app/api/brands/editBrand.php?brandId=<?php echo $brand['id'] ?>"
            class="addBrand-form" enctype="multipart/form-data">
            <div>
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

                <div>
                    <label for="brandPicture">Brand Picture:</label>
                    <input type="file" name="brandPicture" id="brandPicture" accept="image/*"
                        onChange="previewInputImage(event)">
                    <input type="hidden" name="currentPicture" value="<?php echo $brand['brandPicture'] ?>">
                    <img id="previewImage" src="/CarLog/public/uploads/brands/<?php echo $brand['brandPicture'] ?>"
                        alt="Preview" style="width: 100px; height: 100px;">
                </div>

            </div>
            <button type="submit">Edit Brand</button>
        </form>
        <?php
    }



}











