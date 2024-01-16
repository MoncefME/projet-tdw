<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class ManageBrandsPage
{
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
                    <h1>Manage Brands</h1>
                    <button class="btn btn-dark" id="toggleButtonBrand">
                        <i class="fas fa-plus"></i>
                        <span>Add Brand</span>
                    </button>
                </div>
                <?php
                $this->showBrandsTable();
                $this->addBrandForm();
                ?>
            </div>
        </div>
    <?php
    }
    private function addBrandForm()
    {
    ?>
        <div class="brands__form" id="brandForm" style="display:none;">
            <form method="POST" action="<?= ApiRouter::ADD_BRAND_ENDPOINT ?>" enctype="multipart/form-data">
                <div class="brands__form__inputs__container">
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
                    <div class="two__columns">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" placeholder="Enter description" required></textarea>
                    </div>
                    <div>
                        <label for="brandPicture">Brand Picture:</label>
                        <input type="file" name="brandPicture" id="brandPicture" accept="image/*" required onChange="previewInputImage(event)">
                        <img id="previewImage" src="#" alt="Preview" style="display: none; width: 100px; height: 100px;">
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">
                    <i class="fas fa-plus"></i>
                    <span> Add Brand</span>
                </button>
            </form>
        </div>
    <?php
    }

    private function showBrandsTable()
    {
        $brandController = new BrandController();
        $brands = $brandController->getAllBrands();
    ?>
        <div class="brands__table" id="brandsTable" style="display: none;">
            <table data-toggle="table" data-pagination="true" data-search="true" class="table  table-striped table-borderless  table-hover" data-page-size="4" id="brandTable">
                <thead class="thead-light">
                    <tr>
                        <th data-field="name">Name</th>
                        <th data-field="originCountry">Country</th>
                        <th data-field="headquarter">Headquarter</th>
                        <th data-field="year" data-sortable="true">Year</th>
                        <th data-field="brandPicture">Picture</th>
                        <th data-field="action">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($brands as $brand) { ?>
                        <tr>
                            <td>
                                <?= $brand['name'] ?>
                            </td>
                            <td>
                                <?= $brand['originCountry'] ?>
                            </td>
                            <td>
                                <?= $brand['headquarter'] ?>
                            </td>
                            <td>
                                <span class="badge badge-info">
                                    <?= $brand['year'] ?>
                                </span>
                            </td>
                            <td>
                                <a href="/CarLog/brand/?id=<?= $brand['id'] ?>">
                                    <img src="<?= ImageUtility::getBrandLogo($brand); ?>" alt="<?= $brand['brandPicture'] ?>" width="50px" height="50px">
                                </a>
                            </td>
                            <td class="table__action__btn">
                                <a class="btn btn-info" href="/CarLog/admin/manageVehiculesPage/?brandId=<?= $brand['id'] ?>">
                                    <i class="fas fa-car"></i>
                                </a>
                                <button class="btn btn-primary" onclick="location.href='<?= ApiRouter::EDIT_BRAND_URL($brand['id']) ?>'">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="deleteBrand(<?= $brand['id'] ?>)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
<?php
    }
}
