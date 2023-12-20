<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class ManageBrandsPage
{
    public function showPage()
    {
        ?>
        <div class="page">
            <p>Manage Brands Page</p>
            <?php
            $sharedView = new SharedViews();
            $sharedView->adminSideBar();
            $this->addBrandForm();
            $this->showBrandsTable();
            ?>
        </div>
        <?php
    }
    private function addBrandForm()
    {
        ?>
        <form method="POST" action="/CarLog/app/api/brands/addBrand.php" class="addBrand-form" enctype="multipart/form-data">
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
                    <img id="previewImage" src="#" alt="Preview" style="display: none; width: 100px; height: 100px;">
                </div>
                <script>
                    document.getElementById('brandPicture').addEventListener('change', function () {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            document.getElementById('previewImage').src = e.target.result;
                            document.getElementById('previewImage').style.display = 'block';
                        };
                        reader.readAsDataURL(this.files[0]);
                    });
                </script>
            </div>
            <button type="submit">Add Brand</button>
        </form>
        <?php
    }

    private function showBrandsTable()
    {
        $brandController = new BrandController();
        $brands = $brandController->getAllBrands();
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Origin Country</th>
                    <th>Headquarter</th>
                    <th>Year Established</th>
                    <th>Brand Picture</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($brands as $brand) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $brand['name'] ?>
                        </td>
                        <td>
                            <?php echo $brand['originCountry'] ?>
                        </td>
                        <td>
                            <?php echo $brand['headquarter'] ?>
                        </td>
                        <td>
                            <?php echo $brand['year'] ?>
                        </td>
                        <td>
                            <img src="/CarLog/public/uploads/brands/<?php echo $brand['brandPicture'] ?>"
                                alt="<?php echo $brand['brandPicture'] ?>" width="50px" height="50px">
                        </td>
                        <td class="table-action-btn">
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
}
