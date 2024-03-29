<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");
class SingleComparisionPage
{
    private $vehiculeA;
    private $vehiculeB;
    private $brands;

    public function __construct($vehiculeA, $vehiculeB)
    {
        $vehiculeController = new VehiculeController();
        $brandController = new BrandController();

        if ($vehiculeA !== null && $vehiculeB !== null) {
            $this->vehiculeA = $vehiculeController->getVehiculeById($vehiculeA);
            $this->vehiculeB = $vehiculeController->getVehiculeById($vehiculeB);

            if ($this->vehiculeA === null && $this->vehiculeB === null) {
                header('Location: /CarLog/notFound');
            }
        } else {
            if ($vehiculeA !== null) {
                $this->vehiculeA = $vehiculeController->getVehiculeById($vehiculeA);
            } elseif ($vehiculeB !== null) {
                $this->vehiculeB = $vehiculeController->getVehiculeById($vehiculeB);
            }

            if ($this->vehiculeA === null && $this->vehiculeB === null) {
                header('Location: /CarLog/notFound');
            }
        }

        $this->brands = $brandController->getAllBrands();
    }



    public function showPage()
    {
        $shardViews = new SharedViews();
?>
        <div class="page__content">
            <?php
            $shardViews->showHeader();
            $shardViews->showNavBar();
            $this->showComparator();
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
            if ($this->vehiculeA == null) {
                $this->showVehiculeComparisonForm('1');
            } else {
                $this->showExistingVehiculeComparisonForm('1', $this->vehiculeA);
            }
            if ($this->vehiculeB == null) {
                $this->showVehiculeComparisonForm('2');
            } else {
                $this->showExistingVehiculeComparisonForm('2', $this->vehiculeB);
            }
            $this->showVehiculeComparisonForm('3');
            $this->showVehiculeComparisonForm('4');
            ?>
        </div>
        <button class="btn btn-primary" onclick="showComparisionTable(false)">Show Table</button>
    <?php
        $this->showComparatorResult();
    }



    private function showExistingVehiculeComparisonForm($vehiculeNumber, $vehicule)
    {
        $selectedBrand = null;

        foreach ($this->brands as $brand) {
            if ($brand['id'] === $vehicule['brand_id']) {
                $selectedBrand = $brand;
                break;
            }
        }
        $brand = $selectedBrand;


    ?>
        <div class="vehicule__form__container">

            <form>
                <div>
                    <label>Brand</label>
                    <select name="brand-<?= $vehiculeNumber; ?>" disabled="true">
                        <option value="0">
                            <?= $brand['name']; ?>
                        </option>
                    </select>
                </div>
                <div id="model-input-<?= $vehiculeNumber; ?>">
                    <label>Model</label>
                    <select name="model-<?= $vehiculeNumber; ?>" disabled="true">
                        <option>
                            <?= $vehicule['model']; ?>
                        </option>
                    </select>
                </div>
                <div id="year-input-<?= $vehiculeNumber; ?>">
                    <label>Year</label>
                    <select name="year-<?= $vehiculeNumber; ?>" disabled="true">
                        <option value="0">
                            <?= $vehicule['year']; ?>
                        </option>
                    </select>
                </div>
            </form>
            <div class="result-<?= $vehiculeNumber; ?>">
                <div class="vehicle__info__card">
                    <a href="/CarLog/vehicule/?id=<?= $vehicule["id"] ?>">
                        <img src="<?= ImageUtility::getVehiculePicture($vehicule); ?>" alt="<?php echo $vehicule['vehiculePicture'] ?>" width="100%" height="auto" style="border-radius: 5px;">
                    </a>
                    <p>
                        <b>Model:</b>
                        <?= $vehicule['model']; ?>
                    </p>
                    <p>
                        <b>Version:</b>
                        <?= $vehicule['version']; ?>
                    </p>
                    <p>
                        <b>Year:</b>
                        <?= $vehicule['year']; ?>
                    </p>
                    <input type="hidden" name="vehiculeId-<?php echo $vehiculeNumber; ?>" value="<?php echo $vehicule['id']; ?>">
                </div>

            </div>
        </div>
    <?php
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
                    <select name="model-<?= $vehiculeNumber; ?>" onchange="handleModelChange(this,<?= $vehiculeNumber; ?>)" disabled="true">
                        <option value="0">Select a model</option>
                    </select>
                </div>
                <div id="year-input-<?= $vehiculeNumber; ?>">
                    <label>Year</label>
                    <select name="year-<?= $vehiculeNumber; ?>" onchange="handleYearsChange(this,<?= $vehiculeNumber; ?>)" disabled="true">
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
        <table class="comparision-result-table table table-striped table-bordered">
        </table>
<?php
    }
}
