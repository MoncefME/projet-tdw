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
            <p>Manage Vehicules Page</p>
            <button class="btn btn-primary">Add Vehicule</button>
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
                            <?php echo $vehicule['vehiculePicture'] ?>
                        </td>
                        <td>
                            <?php
                            $brandController = new BrandController();
                            $brand = $brandController->getBrandById($vehicule['brand_id']);
                            echo $brand['name'];
                            ?>
                        </td>
                        <td class="table-action-btn">
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <?php
                }

    }

    private function addVehiculeForm()
    {
        ?>
                <form method="POST" action="/CarLog/app/api/vehicules/addVehicule.php" class="addVehicule-form">
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
                            <input type="text" name="vehiculePicture" id="vehiculePicture" placeholder="Enter vehicle picture"
                                required>
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
                            <label for="brand_id">Brand ID:</label>
                            <input type="number" name="brand_id" id="brand_id" placeholder="Enter brand ID" required>
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