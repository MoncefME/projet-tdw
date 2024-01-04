<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");
class ManageVehiculesPage
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
                <div class="dashboard__header-vehicules">
                    <h1>Manage Vehicules</h1>
                    <button class="btn btn-dark" id="toggleButtonVehicule">
                        <i class="fas fa-plus"></i>
                        <span>Add Vehicule</span>
                    </button>
                </div>
                <?php
                $this->showVehiculesTable();
                $this->addVehiculeForm();
                ?>
            </div>
        </div>
        <?php
    }

    private function showVehiculesTable()
    {
        $brandController = new BrandController();
        $vehiculeController = new VehiculeController();
        $vehicules = $vehiculeController->getAllVehicules();
        ?>
        <div class="vehicules__table" id="vehiculesTable" style="display: none;">
            <table id="vehiculeTable" data-toggle="table" data-pagination="true" data-search="true"
                class="table  table-striped table-borderless  table-hover" data-page-size="4">
                <thead class="thead-light">
                    <tr>
                        <th data-field="model" data-sortable="true">Model</th>
                        <th data-field="version" data-sortable="true">Version</th>
                        <th data-field="year" data-sortable="true">Year</th>
                        <th data-field="vehicle_picture">Vehicle Picture</th>
                        <th data-field="brand">Brand</th>
                        <th data-field="actions">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($vehicules as $vehicule) {
                        ?>
                        <tr>
                            <td>
                                <?= $vehicule['model'] ?>
                            </td>
                            <td>
                                <?= $vehicule['version'] ?>
                            </td>
                            <td>
                                <?= $vehicule['year'] ?>
                            </td>
                            <td>
                                <img src="<?= ImageUtility::getVehiculePicture($vehicule); ?>"
                                    alt="<?= $vehicule['vehiculePicture'] ?>" width="100px" height="auto">
                            </td>
                            <td>
                                <?php
                                $brand = $brandController->getBrandById($vehicule['brand_id']);
                                ?>
                                <img src="<?= ImageUtility::getBrandLogo($brand); ?>" alt="<?= $brand['brandPicture'] ?>"
                                    width="50px" height="50px">
                            </td>
                            <td class="table__action__btn">
                                <button class="btn btn-primary"
                                    onclick="location.href='<?= ApiRouter::EDIT_VEHICULE_URL($vehicule['id']) ?>'">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="deleteVehicule(<?= $vehicule['id'] ?>)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
    }

    private function addVehiculeForm()
    {

        $brandController = new BrandController();
        $brands = $brandController->getAllBrands();
        ?>
        <div class="vehicules__form" id="vehiculeForm" style="display:none;">
            <form method="POST" action="<?= ApiRouter::ADD_VEHICULE_ENDPOINT ?>" enctype="multipart/form-data">
                <div class="vehicules__form__inputs__container">
                    <div>
                        <label for="model">Model:</label>
                        <input type="text" name="model" id="model" placeholder="Enter model" required>
                    </div>
                    <div>
                        <label for="version">Version:</label>
                        <input type="text" name="version" id="version" placeholder="Enter version" required>
                    </div>
                    <div>
                        <label for="year">Year:</label>
                        <input type="number" name="year" id="year" placeholder="Enter year" required>
                    </div>
                    <div>
                        <label for="vehiculePicture">Vehicle Picture:</label>
                        <input type="file" name="vehiculePicture" id="vehiculePicture" accept="image/*" required
                            onChange="previewInputImage(event)">
                        <img id="previewImage" src="#" alt="Preview" style="display: none; width: 100px; height: 100px;">
                    </div>
                    <div>
                        <label for="brand_id">Brand:</label>
                        <select name="brand_id" id="brand_id" required>
                            <?php
                            foreach ($brands as $brand) {
                                ?>
                                <option value="<?= $brand['id']; ?>">
                                    <?= $brand['name']; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="length">Length:</label>
                        <input type="number" name="length" id="length" placeholder="Enter length" required>
                    </div>
                    <div>
                        <label for="width">Width:</label>
                        <input type="number" name="width" id="width" placeholder="Enter width" required>
                    </div>
                    <div>
                        <label for="height">Height:</label>
                        <input type="number" name="height" id="height" placeholder="Enter height" required>
                    </div>
                    <div>
                        <label for="wheelBase">Wheel Base:</label>
                        <input type="number" name="wheelBase" id="wheelBase" placeholder="Enter wheel base" required>
                    </div>
                    <div>
                        <label for="engine">Engine:</label>
                        <input type="text" name="engine" id="engine" placeholder="Enter engine" required>
                    </div>
                    <div>
                        <label for="performance">Performance:</label>
                        <input type="text" name="performance" id="performance" placeholder="Enter performance" required>
                    </div>
                    <div>
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" placeholder="Enter price" required>
                    </div>
                    <div>
                        <label for="consumption">Consumption:</label>
                        <input type="number" name="consumption" id="consumption" placeholder="Enter consumption" required>
                    </div>

                    <div>
                        <label for="note">Note:</label>
                        <input type="text" name="note" id="note" placeholder="Enter note" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">
                    <i class="fas fa-plus"></i>
                    <span> Add Vehicule</span>
                </button>
            </form>
        </div>
        <?php
    }
}