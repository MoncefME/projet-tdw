<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/vehiculeModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/config/utils/uploadFile.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/config/utils/formValidation.php');
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

    public function getVehiculesByBrand($brandId)
    {
        $vehiculeModel = new VehiculeModel();
        $vehicules = $vehiculeModel->getVehiculesByBrand($brandId);
        return $vehicules;
    }

    public function addVehicule()
    {
        $vehiculeModel = new VehiculeModel();
        $formValidation = new FormValidation();

        $model = $formValidation->validateInput('model');
        $version = $formValidation->validateInput('version');
        $year = $formValidation->validateInput('year');
        $length = $formValidation->validateInput('length');
        $width = $formValidation->validateInput('width');
        $height = $formValidation->validateInput('height');
        $wheelBase = $formValidation->validateInput('wheelBase');
        $engine = $formValidation->validateInput('engine');
        $performance = $formValidation->validateInput('performance');
        $price = $formValidation->validateInput('price');
        $consumption = $formValidation->validateInput('consumption');
        $brandId = $formValidation->validateInput('brand_id');
        $note = $formValidation->validateInput('note');

        $uploadHandler = new UploadFile();
        $uploadedFileName = $uploadHandler->uploadVehiculeFile();


        return $uploadedFileName ? $vehiculeModel->addVehicule($model, $version, $year, $uploadedFileName, $length, $width, $height, $wheelBase, $engine, $performance, $price, $consumption, $brandId, $note) : false;
    }

    public function deleteVehicule($vehiculeId)
    {
        $vehiculeModel = new VehiculeModel();
        $success = $vehiculeModel->deleteVehicule($vehiculeId);
        return $success;
    }

    public function updateVehicule($vehiculeId)
    {
        $vehiculeModel = new VehiculeModel();
        $formValidation = new FormValidation();


        $model = $formValidation->validateInput('model');
        $version = $formValidation->validateInput('version');
        $year = $formValidation->validateInput('year');
        $length = $formValidation->validateInput('length');
        $width = $formValidation->validateInput('width');
        $height = $formValidation->validateInput('height');
        $wheelBase = $formValidation->validateInput('wheelBase');
        $engine = $formValidation->validateInput('engine');
        $performance = $formValidation->validateInput('performance');
        $price = $formValidation->validateInput('price');
        $consumption = $formValidation->validateInput('consumption');
        $brandId = $formValidation->validateInput('brand_id');
        $note = $formValidation->validateInput('note');


        $uploadHandler = new UploadFile();
        $uploadedFileName = $uploadHandler->uploadVehiculeFile();

        if (!$uploadedFileName) {
            $uploadedFileName = $formValidation->validateInput('currentPicture');
        }


        return $vehiculeModel->updateVehicule($vehiculeId, $model, $version, $year, $uploadedFileName, $length, $width, $height, $wheelBase, $engine, $performance, $price, $consumption, $note, $brandId);
    }

    public function getModelsByBrandId($brandId)
    {
        $vehiculeModel = new VehiculeModel();
        $models = $vehiculeModel->getModelsByBrandId($brandId);
        return $models;
    }

    public function getYearsByBrandAndModel($brandId, $model)
    {
        $vehiculeModel = new VehiculeModel();
        $years = $vehiculeModel->getYearsByBrandAndModel($brandId, $model);
        return $years;
    }

    public function getVehiculeByBrandModelYear($brandId, $model, $year)
    {
        $vehiculeModel = new VehiculeModel();
        $vehicule = $vehiculeModel->getVehiculeByBrandModelYear($brandId, $model, $year);
        return $vehicule;
    }

}
