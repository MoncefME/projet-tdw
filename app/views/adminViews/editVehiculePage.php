<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");

class EditVehiculePage
{
    private $id;
    private $vehicule;

    public function __construct($id)
    {
        $this->id = $id;
        $vehiculeController = new VehiculeController();
        $this->vehicule = $vehiculeController->getVehiculeById($id);
        if ($this->vehicule == null) {
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
                <div class="dashboard__header-vehicules">
                    <h1>Edit Vehicule </h1>
                </div>
                <?php
                $this->showVehiculeFrom();
                ?>
            </div>
        </div>
        <?php
    }


    private function showVehiculeFrom()
    {
        // $vehiculeController = new VehiculeController();
        // $vehicule = $vehiculeController->getVehiculeById($this->id);
        $vehicule = $this->vehicule;
        $brandController = new BrandController();
        $brands = $brandController->getAllBrands();
        ?>
        <div class="vehicules__form" id="vehiculeForm">
            <form method="POST" action="<?= ApiRouter::EDIT_VEHICULE_ENDPOINT($vehicule['id']) ?>"
                enctype="multipart/form-data">
                <div class="vehicules__form__inputs__container">
                    <div>
                        <label for="model">Model:</label>
                        <input type="text" name="model" id="model" placeholder="Enter model" required
                            value="<?php echo $vehicule['model'] ?>">
                    </div>

                    <div>
                        <label for="version">Version:</label>
                        <input type="text" name="version" id="version" placeholder="Enter version" required
                            value="<?php echo $vehicule['version'] ?>">
                    </div>

                    <div>
                        <label for="year">Year:</label>
                        <input type="number" name="year" id="year" placeholder="Enter year" required
                            value="<?php echo $vehicule['year'] ?>">
                    </div>

                    <div>
                        <label for="length">Length:</label>
                        <input type="text" name="length" id="length" placeholder="Enter length" required
                            value="<?php echo $vehicule['length'] ?>">
                    </div>

                    <div>
                        <label for="width">Width:</label>
                        <input type="text" name="width" id="width" placeholder="Enter width" required
                            value="<?php echo $vehicule['width'] ?>">
                    </div>

                    <div>
                        <label for="height">Height:</label>
                        <input type="text" name="height" id="height" placeholder="Enter height" required
                            value="<?php echo $vehicule['height'] ?>">
                    </div>

                    <div>
                        <label for="wheelBase">Wheel Base:</label>
                        <input type="text" name="wheelBase" id="wheelBase" placeholder="Enter wheel base" required
                            value="<?php echo $vehicule['wheelBase'] ?>">
                    </div>

                    <div>
                        <label for="engine">Engine:</label>
                        <input type="text" name="engine" id="engine" placeholder="Enter engine" required
                            value="<?php echo $vehicule['engine'] ?>">
                    </div>

                    <div>
                        <label for="performance">Performance:</label>
                        <input type="text" name="performance" id="performance" placeholder="Enter performance" required
                            value="<?php echo $vehicule['performance'] ?>">
                    </div>

                    <div>
                        <div>

                            <label for="price">Price:</label>
                            <input type="text" name="price" id="price" placeholder="Enter price" required
                                value="<?php echo $vehicule['price'] ?>">
                        </div>
                        <div>
                            <label for="note">Note:</label>
                            <input type="text" name="note" id="note" placeholder="Enter note" required
                                value="<?php echo $vehicule['note'] ?>">
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="consumption">Consumption:</label>
                            <input type="text" name="consumption" id="consumption" placeholder="Enter consumption" required
                                value="<?php echo $vehicule['consumption'] ?>">
                        </div>
                        <div class="brand_logo_input">
                            <label for="brand_id">Brand:</label>
                            <select name="brand_id" id="brand_id" required>
                                <?php
                                foreach ($brands as $brand) {
                                    $selected = ($brand['id'] == $vehicule['brand_id']) ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $brand['id']; ?>" <?php echo $selected; ?>>
                                        <?php echo $brand['name']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="vehiculePicture">Vehicule Picture:</label>
                        <input type="file" name="vehiculePicture" id="vehiculePicture" accept="image/*"
                            onChange="previewInputImage(event)">
                        <input type="hidden" name="currentPicture" value="<?php echo $vehicule['vehiculePicture'] ?>">
                        <img id="previewImage" src="<?= ImageUtility::getVehiculePicture($vehicule) ?>" alt="Preview"
                            style="width: 100px; height: 100px;">
                    </div>

                </div>
                <button type="submit" class="btn btn-dark">
                    <span> Edit Vehicule</span>
                </button>
            </form>
        </div>
        <?php
    }
}











