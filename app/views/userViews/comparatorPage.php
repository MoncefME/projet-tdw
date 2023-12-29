<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");

class ComparatorPage
{
    private $brandController;
    private $brands;

    public function __construct()
    {
        $this->brandController = new BrandController();
        $this->brands = $this->brandController->getAllBrands();
    }

    public function showPage()
    {
        $shardViews = new SharedViews();
        $shardViews->showHeader();
        echo '<h1>Comparator Page</h1>';
        $this->showComparator();
        //$this->showComparatorResult();
        $shardViews->showFooter();
    }

    public function showComparator()
    {
        ?>
        <div class="comparator-container">
            <?php
            $this->showVehiculeComparisonForm('1');
            $this->showVehiculeComparisonForm('2');
            $this->showVehiculeComparisonForm('3');
            $this->showVehiculeComparisonForm('4');
            ?>
        </div>
        <button class="btn btn-primary" onclick="showComparisionTable()">Compare</button>
        <?php
        $this->showComparatorResult();
    }

    private function showVehiculeComparisonForm($vehiculeNumber)
    {
        ?>
        <div class="vehicule-form-container-<?= $vehiculeNumber; ?>">
            <form>
                <div>
                    <label>Brand</label>
                    <select name="brand-<?= $vehiculeNumber; ?>" onchange="handleBrandChange(this,<?= $vehiculeNumber; ?>)">
                        <option value="0">Select a Brand</option>
                        <?php
                        foreach ($this->brands as $brand) {
                            echo '<option value="' . $brand['id'] . '">' . $brand['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div id="model-input-<?= $vehiculeNumber; ?>">
                    <label>Model</label>
                    <select name="model-<?= $vehiculeNumber; ?>" onchange="handleModelChange(this,<?= $vehiculeNumber; ?>)"
                        disabled="true">
                        <option value="0">Select a model</option>
                    </select>
                </div>
                <div id="year-input-<?= $vehiculeNumber; ?>">
                    <label>Year</label>
                    <select name="year-<?= $vehiculeNumber; ?>" onchange="handleYearsChange(this,<?= $vehiculeNumber; ?>)"
                        disabled="true">
                        <option value="0">Select a year</option>
                    </select>
                </div>
            </form>
            <div class="result-<?= $vehiculeNumber; ?>">

            </div>
        </div>
        <?php
    }

    private function showComparatorResult()
    {
        ?>
        <table class="comparision-result-table table table-striped table-bordered" style="display: none;">

        </table>
        <?php
    }
}

