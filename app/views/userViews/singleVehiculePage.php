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
        $this->showInfoTable();
        $shardViews->showFooter();
    }


    public function showInfoTable()
    {
        $vehiculeController = new VehiculeController();
        $vehicule = $vehiculeController->getVehiculeById($this->id);

        $brandController = new BrandController();
        $brand = $brandController->getBrandById($vehicule['brand_id']);
        ?>
        <table class="table vehicule-info-table">
            <tbody>
                <tr>
                    <td>Model:</td>
                    <td>
                        <?php echo $vehicule['model']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Brand</td>
                    <td><img src="/CarLog/public/uploads/brands/<?php echo $brand['brandPicture'] ?>"
                            alt="<?php echo $brand['brandPicture'] ?>" width="50px" height="50px"></td>
                </tr>
                <tr>
                    <td>Version:</td>
                    <td>
                        <?php echo $vehicule['version']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Year:</td>
                    <td>
                        <?php echo $vehicule['year']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Vehicle Picture:</td>
                    <td><img src="/CarLog/public/uploads/vehicules/<?php echo $vehicule['vehiculePicture'] ?>"
                            alt="<?php echo $vehicule['vehiculePicture'] ?>" width="50px" height="50px"></td>
                </tr>
                <tr>
                    <td>Length:</td>
                    <td>
                        <?php echo $vehicule['length']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Width:</td>
                    <td>
                        <?php echo $vehicule['width']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Height:</td>
                    <td>
                        <?php echo $vehicule['height']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Wheel Base:</td>
                    <td>
                        <?php echo $vehicule['wheelBase']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Engine:</td>
                    <td>
                        <?php echo $vehicule['engine']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Performance:</td>
                    <td>
                        <?php echo $vehicule['performance']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <?php echo $vehicule['price']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Consumption:</td>
                    <td>
                        <?php echo $vehicule['consumption']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Note:</td>
                    <td>
                        <?php echo $vehicule['note']; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
    }

    public function showReviews()
    {

    }

    public function showAddReviewForm()
    {

    }
}