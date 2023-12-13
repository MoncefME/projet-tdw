<?php
class ManageBrandsPage
{
    public function showPage()
    {
        echo 'ManageBrandsPage';
    }
    private function addBrandForm()
    {
        ?>
        <form method="POST" action="/CarLog/app/api/brands/addBrand.php">
            <label for="name">Brand Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter brand name" required>

            <label for="originCountry">Origin Country:</label>
            <input type="text" name="originCountry" id="originCountry" placeholder="Enter origin country" required>

            <label for="headquarter">Headquarter:</label>
            <input type="text" name="headquarter" id="headquarter" placeholder="Enter headquarter" required>

            <label for="year">Year Established:</label>
            <input type="number" name="year" id="year" placeholder="Enter year" required>

            <label for="brandPicture">Brand Picture URL:</label>
            <input type="url" name="brandPicture" id="brandPicture" placeholder="Enter brand picture URL" required>

            <button type="submit">Add Brand</button>
        </form>
        <?php
    }
}
