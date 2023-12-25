<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/BrandController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/VehiculeController.php");
class SingleBrandPage
{
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function showPage()
    {

        $shardViews = new SharedViews();
        $shardViews->showHeader();
        $this->showBrandInfo();
        $this->showBrandVehicles();
        $shardViews->showFooter();
    }
    private function showBrandInfo()
    {
        $brandController = new BrandController();
        $brand = $brandController->getBrandById($this->id);

        ?>
        <div class="header">
            <p>Name:
                <?php echo $brand['name']; ?>
            </p>
            <p>Origin Country:
                <?php echo $brand['originCountry']; ?>
            </p>
            <p>Headquarter:
                <?php echo $brand['headquarter']; ?>
            </p>
            <p>Year:
                <?php echo $brand['year']; ?>
            </p>
            <img src="/CarLog/public/uploads/brands/<?php echo $brand['brandPicture'] ?>"
                alt="<?php echo $brand['brandPicture'] ?>" width="50px" height="50px">
        </div>
        <?php
    }

    private function showBrandVehicles()
    {
        $vehiculeController = new VehiculeController();
        $vehicules = $vehiculeController->getVehiculesByBrand($this->id);

        ?>
        <h1>Vehicles</h1>
        <div class="vehicles">
            <?php
            foreach ($vehicules as $vehicule) {
                ?>
                <div class="vehicle-info">
                    <p>Model:
                        <?php echo $vehicule['model']; ?>
                    </p>
                    <p>Version:
                        <?php echo $vehicule['version']; ?>
                    </p>
                    <p>Year:
                        <?php echo $vehicule['year']; ?>
                    </p>
                    <img src="/CarLog/public/uploads/vehicules/<?php echo $vehicule['vehiculePicture'] ?>"
                        alt="<?php echo $vehicule['vehiculePicture'] ?>" width="50px" height="50px">
                    <a href="/CarLog/vehicule/?id=<?php echo $vehicule["id"] ?>"> Show Details </a>
                </div>
                <?php
            } ?>
        </div>
        <?php
    }
}











