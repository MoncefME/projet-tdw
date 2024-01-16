<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/vehiculeModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/config/utils/uploadFile.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/config/utils/formValidation.php');
class VehiculeController
{
    public function getVehiculeById($vehiculeId)
    {
        $vehiculeModel = new VehiculeModel();
        return $vehiculeModel->getVehiculeById($vehiculeId);
    }

    public function getAllVehicules()
    {
        $vehiculeModel = new VehiculeModel();
        return $vehiculeModel->getAllVehicules();
    }

    public function getVehiculesByBrand($brandId)
    {
        $vehiculeModel = new VehiculeModel();
        return $vehiculeModel->getVehiculesByBrand($brandId);
    }

    public function addVehicule()
    {
        $vehiculeModel = new VehiculeModel();


        $model = FormValidation::validateInput('model');
        $version = FormValidation::validateInput('version');
        $year = FormValidation::validateInput('year');
        $length = FormValidation::validateInput('length');
        $width = FormValidation::validateInput('width');
        $height = FormValidation::validateInput('height');
        $wheelBase = FormValidation::validateInput('wheelBase');
        $engine = FormValidation::validateInput('engine');
        $performance = FormValidation::validateInput('performance');
        $price = FormValidation::validateInput('price');
        $consumption = FormValidation::validateInput('consumption');
        $brandId = FormValidation::validateInput('brand_id');
        $note = FormValidation::validateInput('note');

        $uploadHandler = new UploadFile();
        $uploadedFileName = $uploadHandler->uploadVehiculeFile();

        return $uploadedFileName ? $vehiculeModel->addVehicule($model, $version, $year, $uploadedFileName, $length, $width, $height, $wheelBase, $engine, $performance, $price, $consumption, $brandId, $note) : false;
    }

    public function deleteVehicule($vehiculeId)
    {
        $vehiculeModel = new VehiculeModel();
        return $vehiculeModel->deleteVehicule($vehiculeId);
    }

    public function updateVehicule($vehiculeId)
    {
        $vehiculeModel = new VehiculeModel();

        $model = FormValidation::validateInput('model');
        $version = FormValidation::validateInput('version');
        $year = FormValidation::validateInput('year');
        $length = FormValidation::validateInput('length');
        $width = FormValidation::validateInput('width');
        $height = FormValidation::validateInput('height');
        $wheelBase = FormValidation::validateInput('wheelBase');
        $engine = FormValidation::validateInput('engine');
        $performance = FormValidation::validateInput('performance');
        $price = FormValidation::validateInput('price');
        $consumption = FormValidation::validateInput('consumption');
        $brandId = FormValidation::validateInput('brand_id');
        $note = FormValidation::validateInput('note');


        $uploadHandler = new UploadFile();
        $uploadedFileName = $uploadHandler->uploadVehiculeFile();

        if (!$uploadedFileName) {
            $uploadedFileName = FormValidation::validateInput('currentPicture');
        }

        return $vehiculeModel->updateVehicule($vehiculeId, $model, $version, $year, $uploadedFileName, $length, $width, $height, $wheelBase, $engine, $performance, $price, $consumption, $note, $brandId);
    }

    public function getVehiculeByBrandModelYear($brandId, $model, $year)
    {
        $vehiculeModel = new VehiculeModel();
        return $vehiculeModel->getVehiculeByBrandModelYear($brandId, $model, $year);
    }

    public function getAllVehiculesPerPage($page)
    {
        $vehiculeModel = new VehiculeModel();
        return $vehiculeModel->getAllVehiculesPerPage($page);
    }

    public function getAllVehiculesWithRating(){
        $vehiculeModel = new VehiculeModel();
        return $vehiculeModel->getAllVehiculesWithRating();
    }

}
