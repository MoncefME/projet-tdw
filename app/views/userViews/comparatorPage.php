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
        $shardViews->showHeader();
        echo '<h1>Comparator Page</h1>';
        $this->showComparator();
        $this->showPopularComparisons();
        $shardViews->showFooter();
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
        <table class="comparision-result-table table table-striped table-bordered" style="display: none;">
        </table>
        <?php
    }

    private function showPopularComparisons()
    {
        $comparisionController = new ComparisionController();
        $mostComparedVehiculePairs = $comparisionController->getMostComparedVehiculePairs();
        ?>
        <h1>Popular Comparisons</h1>
        <div class="popular-comparisions-container">
            <?php
            foreach ($mostComparedVehiculePairs as $pair) {
                $vehiculeController = new VehiculeController();
                $vehiculeA = $vehiculeController->getVehiculeById($pair['vehicule_id_A']);
                $vehiculeB = $vehiculeController->getVehiculeById($pair['vehicule_id_B']);
                $pair_occurrence_count = $pair['pair_occurrence_count'];
                $this->showComparisionCard($vehiculeA, $vehiculeB, $pair_occurrence_count);
            }
            ?>
        </div>
        <?php
    }

    private function showComparisionCard($vehiculeA, $vehiculeB, $pair_occurrence_count)
    {
        ?>
        <div class="comparision-card">
            <div class="vehiculeA">
                <a href="/CarLog/vehicule/?id=<?php echo $vehiculeA["id"] ?>">
                    <img src="/CarLog/public/uploads/vehicules/<?= $vehiculeA['vehiculePicture']; ?>" width="50">
                </a>
                <p>
                    <?= $vehiculeA['model']; ?>
                </p>
                <p>
                    <?= $vehiculeA['year']; ?>
                </p>
            </div>
            <div>
                <a href="/CarLog/comparision/?idA=<?php echo $vehiculeA["id"] ?>&idB=<?php echo $vehiculeB["id"] ?>">
                    VS
                </a>
                <p>
                    <?= $pair_occurrence_count; ?>
                </p>
            </div>
            <div class="vehiculeB">
                <a href="/CarLog/vehicule/?id=<?php echo $vehiculeB["id"] ?>">
                    <img src="/CarLog/public/uploads/vehicules/<?= $vehiculeB['vehiculePicture']; ?>" width="50">
                </a>
                <p>
                    <?= $vehiculeB['model']; ?>
                </p>
                <p>
                    <?= $vehiculeB['year']; ?>
                </p>
            </div>
        </div>
        <?php
    }


}

