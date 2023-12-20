<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/vehiculeModel.php');
class VehiculeController
{
    public function getVehiculeById($vehiculeId)
    {
        $vehiculeModel = new VehiculeModel();
        $vehicule = $vehiculeModel->getVehiculeById($vehiculeId);
        return $vehicule;
    }

    public function getAllVehicules()
    {
        $vehiculeModel = new VehiculeModel();
        $vehicules = $vehiculeModel->getAllVehicules();
        return $vehicules;
    }

    public function addVehicule()
    {
        $vehiculeModel = new VehiculeModel();

        $model = isset($_POST['model']) ? $_POST['model'] : '';
        $version = isset($_POST['version']) ? $_POST['version'] : '';
        $year = isset($_POST['year']) ? $_POST['year'] : '';
        $vehiculePicture = isset($_POST['vehiculePicture']) ? $_POST['vehiculePicture'] : '';
        $length = isset($_POST['length']) ? $_POST['length'] : '';
        $width = isset($_POST['width']) ? $_POST['width'] : '';
        $height = isset($_POST['height']) ? $_POST['height'] : '';
        $wheelBase = isset($_POST['wheelBase']) ? $_POST['wheelBase'] : '';
        $engine = isset($_POST['engine']) ? $_POST['engine'] : '';
        $performance = isset($_POST['performance']) ? $_POST['performance'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $consumption = isset($_POST['consumption']) ? $_POST['consumption'] : '';
        $brandId = isset($_POST['brand_id']) ? intval($_POST['brand_id']) : 0;
        $note = isset($_POST['note']) ? $_POST['note'] : '';

        $success = $vehiculeModel->addVehicule($model, $version, $year, $vehiculePicture, $length, $width, $height, $wheelBase, $engine, $performance, $price, $consumption, $brandId, $note);
        return $success;
    }

    public function deleteVehicule($vehiculeId)
    {
        $vehiculeModel = new VehiculeModel();
        $success = $vehiculeModel->deleteVehicule($vehiculeId);
        return $success;
    }

}
