<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/comparisionController.php");

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
        ?>
        <div class="page__content">
            <?php
            $shardViews->showHeader();
            $shardViews->showNavBar();
            ?>
            <h1>Compare your car</h1>
            <p>Select minimum 2 distinct Cars</p>
            <?php
            $this->showComparator();
            $this->showPopularComparisons();
            $shardViews->showFooter();
            ?>
        </div>
        <?php
    }

    public function showComparator()
    {
        ?>
        <div class="comparator__container">
            <?php
            $this->showVehiculeComparisonForm('1');
            $this->showVehiculeComparisonForm('2');
            $this->showVehiculeComparisonForm('3');
            $this->showVehiculeComparisonForm('4');
            ?>
        </div>
        <button class="btn btn-primary" onclick="showComparisionTable(true)">Compare</button>
        <?php
        $this->showComparatorResult();
    }

    private function showVehiculeComparisonForm($vehiculeNumber)
    {
        ?>
        <div class="vehicule__form__container">
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
        <table class="comparision-result-table table table-striped table-bordered" style="display: none;" >
        </table>
        <?php
    }

    public function showPopularComparisons()
    {
        $comparisionController = new ComparisionController();
        $mostComparedVehiculePairs = $comparisionController->getMostComparedVehiculePairs();
        ?>
        <div class="popular__comparisions__container">
            <h1>Popular Comparisons</h1>
            <div class="comparision__cards">
                <?php
                $vehiculeController = new VehiculeController();
                foreach ($mostComparedVehiculePairs as $pair) {
                    $vehiculeA = $vehiculeController->getVehiculeById($pair['vehicule_id_A']);
                    $vehiculeB = $vehiculeController->getVehiculeById($pair['vehicule_id_B']);
                    $pair_occurrence_count = $pair['pair_occurrence_count'];
                    $this->showComparisionCard($vehiculeA, $vehiculeB, $pair_occurrence_count);
                }
                ?>
            </div>
        </div>
        <?php
    }

    private function showComparisionCard($vehiculeA, $vehiculeB, $pair_occurrence_count)
    {
        ?>
        <div class="comparision__card">
            <div class="vehiculeA">
                <div>
                    <a href="<?= ApiRouter::VEHICULE_URL($vehiculeA['id']); ?>">
                            <img src="<?= ImageUtility::getVehiculePicture($vehiculeA); ?>" width="80" height="auto">
                        </a>
                        <p>
                        <?= $vehiculeA['model']; ?>
                    </p>
                </div>

            </div>
            
            <div class="vehiculeB">
                <div>
                <a href="<?= ApiRouter::VEHICULE_URL($vehiculeB['id']); ?>">
                    <img src="<?= ImageUtility::getVehiculePicture($vehiculeB); ?>" width="80" height="auto">
                </a>
                    <p>
                        <?= $vehiculeB['model'];  ?>
                    </p>
                </div>
            </div>
            <div class="Versus">
                <a href="<?= ApiRouter::COMPARISION_URL($vehiculeA['id'], $vehiculeB['id']); ?>">
                <i class="fas fa-balance-scale"></i>
                </a>
                <!-- <p>
                    <i class="fas fa-eye"></i>
                    <?= $pair_occurrence_count; ?>
                </p> -->
            </div>
        </div>
        <?php
    }



}

