<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/Config/queries/vehiculeQueries.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/databaseController.php');
class VehiculeModel
{
    public function getVehiculeById($vehiculeId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = VehiculeQueries::getVehiculeById;
        $params = [$vehiculeId];
        $vehicule = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $vehicule[0];
    }
    public function getAllVehicules()
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = VehiculeQueries::getAllVehicules;
        $vehicules = $dbController->request($database, $query);

        $dbController->disConnect($database);
        return $vehicules;
    }
    public function getVehiculesByBrand($brandId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = VehiculeQueries::getVehiculesByBrand;
        $params = [$brandId];
        $vehicules = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $vehicules;
    }
    public function addVehicule($model, $version, $year, $vehiculePicture, $length, $width, $height, $wheelbase, $engine, $performance, $price, $consumption, $note, $brand_id)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = VehiculeQueries::addVehicule;
        $params = [$model, $version, $year, $vehiculePicture, $length, $width, $height, $wheelbase, $engine, $performance, $price, $consumption, $note, $brand_id];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success;
    }
    public function updateVehicule($vehiculeId, $model, $version, $year, $vehiculePicture, $length, $width, $height, $wheelbase, $engine, $performance, $price, $consumption, $note, $brand_id)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = VehiculeQueries::updateVehicule;
        $params = [$model, $version, $year, $vehiculePicture, $length, $width, $height, $wheelbase, $engine, $performance, $price, $consumption, $note, $brand_id, $vehiculeId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success;
    }
    public function deleteVehicule($vehiculeId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = VehiculeQueries::deleteVehicule;
        $params = [$vehiculeId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success;
    }

    public function getModelsByBrandId($brandId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = VehiculeQueries::getModelsByBrandId;
        $params = [$brandId];
        $models = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $models;
    }


    public function getVehiculeByBrandModelYear($brandId, $model, $year)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = VehiculeQueries::getVehiculeByBrandModelYear;
        $params = [$brandId, $model, $year];
        $vehicule = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $vehicule[0];
    }

}
