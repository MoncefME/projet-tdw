<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class AddBrandPage
{
    public function showPage()
    {
        ?>
        <div class="page">
            <p>Manage Brands Page</p>
            <button class="btn btn-primary" onclick="">Show All Brands</button>
            <?php
            $sharedView = new SharedViews();
            $sharedView->adminSideBar();
            $this->addBrandForm();
            ?>
        </div>
        <?php
    }
    private function addBrandForm()
    {
        ?>
        <form method="POST" action="/CarLog/app/api/brands/addBrand.php" class="addBrand-form">
            <div>
                <div>
                    <label for="name">Brand Name:</label>
                    <input type="text" name="name" id="name" placeholder="Enter brand name" required>
                </div>

                <div>
                    <label for="originCountry">Origin Country:</label>
                    <input type="text" name="originCountry" id="originCountry" placeholder="Enter origin country" required>
                </div>

                <div>
                    <label for="headquarter">Headquarter:</label>
                    <input type="text" name="headquarter" id="headquarter" placeholder="Enter headquarter" required>
                </div>

                <div>
                    <label for="year">Year Established:</label>
                    <input type="number" name="year" id="year" placeholder="Enter year" required>
                </div>

                <div>
                    <label for="brandPicture">Brand Picture:</label>
                    <input type="file" name="brandPicture" id="brandPicture" accept="image/*" required>
                </div>
            </div>
            <button type="submit">Add Brand</button>
        </form>
        <?php
    }
}
