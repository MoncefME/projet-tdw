<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/databaseController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/config/queries/comparisionQueries.php");
class ComparisionModel
{
    public function getComparisionById($comparisionId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ComparisionQueries::getComparisionById();
        $params = [$comparisionId];
        $comparision = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $comparision[0];
    }
    public function getAllComparisions()
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ComparisionQueries::getAllComparisions();
        $comparisions = $dbController->request($database, $query);

        $dbController->disConnect($database);
        return $comparisions;
    }

    public function addComparision($user_id, $vehicule_1_id, $vehicule_2_id, $vehicule_3_id, $vehicule_4_id)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ComparisionQueries::addComparision();
        $params = [$user_id, $vehicule_1_id, $vehicule_2_id, $vehicule_3_id, $vehicule_4_id];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }

    public function getComparisionsByVehiculeId($vehiculeId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ComparisionQueries::getComparisionsByVehiculeId();
        $params = [$vehiculeId, $vehiculeId, $vehiculeId, $vehiculeId];
        $comparisions = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $comparisions;
    }


    public function getMostComparedVehiculePairs()
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = ComparisionQueries::getMostComparedVehiculePairs();
        $mostComparedVehiculePairs = $dbController->request($database, $query);

        $dbController->disConnect($database);
        return $mostComparedVehiculePairs;
    }
}