<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");

class ComparatorPage
{
    private $vehicule1;
    private $vehicule2;
    private $vehicule3;
    private $vehicule4;
    private $vehiculeController;
    private $brandController;

    public function __construct()
    {
        $this->vehiculeController = new VehiculeController();
        $this->brandController = new BrandController();
    }

    public function showPage()
    {
        $shardViews = new SharedViews();
        $shardViews->showHeader();
        echo 'ComparatorPage';
        $this->showComparator();
        $shardViews->showFooter();
    }

    public function showComparator()
    {
        ?>
        <div class="comparator-container">
            <?php
            $this->showVehiculeComparisonForm($this->vehicule1);
            $this->showVehiculeComparisonForm($this->vehicule2);
            $this->showVehiculeComparisonForm($this->vehicule3);
            $this->showVehiculeComparisonForm($this->vehicule4);
            ?>
        </div>
        <button>Compare</button>
        <?php
    }

    private function showVehiculeComparisonForm()
    {
        $brands = $this->brandController->getAllBrands();
        ?>
        <div class="vehicule-form-container">
            <form>
                <div>
                    <label>Brand</label>
                    <select name="brand" onchange="getBrandVehicules(this)">
                        <?php
                        foreach ($brands as $brand) {
                            echo '<option value="' . $brand['id'] . '">' . $brand['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Model</label>
                    <select name="model">
                        <?php
                        // $models = $vehiculeController->getModelsByBrandId($brand['id']);
                        // foreach ($models as $model) {
                        //     echo '<option value="' . $model . '">' . $model . '</option>';
                        // }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Year</label>
                    <select name="year">
                        <?php
                        // $years = $vehiculeController->getYearsByBrandAndModel($brand['id'], $model);
                        // foreach ($years as $year) {
                        //     echo '<option value="' . $year . '">' . $year . '</option>';
                        // }
                        ?>
                    </select>
                </div>
            </form>
        </div>
        <?php
    }
}

