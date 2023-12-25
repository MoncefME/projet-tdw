<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/vehiculeController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/brandController.php");
class SingleVehiculePage
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
        $this->showVehiculeInfo();
        $shardViews->showFooter();
    }

    private function showVehiculeInfo()
    {
        $vehiculeController = new VehiculeController();
        $vehicule = $vehiculeController->getVehiculeById($this->id);

        $brandController = new BrandController();
        $brand = $brandController->getBrandById($vehicule['brand_id']);


        ?>
        <div>
            <h2>Vehicle Information</h2>
            <ul>
                <li>ID:
                    <?php echo $vehicule['id']; ?>
                </li>
                <li>Model:
                    <?php echo $vehicule['model']; ?>
                </li>
                <li>Version:
                    <?php echo $vehicule['version']; ?>
                </li>
                <li>Year:
                    <?php echo $vehicule['year']; ?>
                </li>
                <li>Vehicle Picture: <img src="/CarLog/public/uploads/vehicules/<?php echo $vehicule['vehiculePicture'] ?>"
                        alt="<?php echo $vehicule['vehiculePicture'] ?>" width="50px" height="50px"></li>
                <li>Length:
                    <?php echo $vehicule['length']; ?>
                </li>
                <li>Width:
                    <?php echo $vehicule['width']; ?>
                </li>
                <li>Height:
                    <?php echo $vehicule['height']; ?>
                </li>
                <li>Wheel Base:
                    <?php echo $vehicule['wheelBase']; ?>
                </li>
                <li>Engine:
                    <?php echo $vehicule['engine']; ?>
                </li>
                <li>Performance:
                    <?php echo $vehicule['performance']; ?>
                </li>
                <li>Price:
                    <?php echo $vehicule['price']; ?>
                </li>
                <li>Consumption:
                    <?php echo $vehicule['consumption']; ?>
                </li>
                <li>Brand ID:
                    <img src="/CarLog/public/uploads/brands/<?php echo $brand['brandPicture'] ?>"
                        alt="<?php echo $brand['brandPicture'] ?>" width="50px" height="50px">
                </li>
                <li>Note:
                    <?php echo $vehicule['note']; ?>
                </li>
            </ul>
        </div>
        <?php
    }
}