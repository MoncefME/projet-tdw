<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");
class ManageVehiculesPage
{
    public function showPage()
    {
        ?>
        <div class="page">
            <h1>Manage Vehicules Page</h1>
            <?php
            $sharedView = new SharedViews();
            $sharedView->adminSideBar();
            $this->showVehiculesTable();
            $this->addVehiculeForm();
            ?>
        </div>
        <?php
    }

    private function showVehiculesTable()
    {
        $vehiculeController = new VehiculeController();
        $vehicules = $vehiculeController->getAllVehicules();
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Version</th>
                    <th>Year</th>
                    <th>Vehicle Picture</th>
                    <th>Brand</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vehicules as $vehicule) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $vehicule['model'] ?>
                        </td>
                        <td>
                            <?php echo $vehicule['version'] ?>
                        </td>
                        <td>
                            <?php echo $vehicule['year'] ?>
                        </td>
                        <td>
                            <img src="/CarLog/public/uploads/vehicules/<?php echo $vehicule['vehiculePicture'] ?>"
                                alt="<?php echo $vehicule['vehiculePicture'] ?>" width="50px" height="50px">
                        </td>

                        <td>
                            <?php
                            $brandController = new BrandController();
                            $brand = $brandController->getBrandById($vehicule['brand_id']);
                            ?>
                            <img src="/CarLog/public/uploads/brands/<?php echo $brand['brandPicture'] ?>"
                                alt="<?php echo $brand['brandPicture'] ?>" width="50px" height="50px">
                        </td>
                        <td class="table-action-btn">
                            <button class="btn btn-primary"
                                onclick="location.href='/CarLog/admin/vehicule/?id=<?php echo $vehicule['id']; ?>'">Edit</button>
                            <button class="btn btn-danger" onclick="deleteVehicule(<?php echo $vehicule['id']; ?>)">Delete</button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }

    private function addVehiculeForm()
    {

        $brandController = new BrandController();
        $brands = $brandController->getAllBrands();
        ?>
        <form method="POST" action="/CarLog/app/api/vehicules/addVehicule.php" class="addVehicule-form"
            enctype="multipart/form-data">
            <div>
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
                    <label for="brand_id">Brand:</label>
                    <select name="brand_id" id="brand_id" required>
                        <?php
                        foreach ($brands as $brand) {
                            ?>
                            <option value="<?php echo $brand['id']; ?>">
                                <?php echo $brand['name']; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="note">Note:</label>
                    <input type="text" name="note" id="note" placeholder="Enter note" required>
                </div>
            </div>
            <button type="submit">Add Vehicle</button>
        </form>
        <?php
    }
}