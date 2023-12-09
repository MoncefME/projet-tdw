<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/databaseController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/Config/queries/brandQueries.php");
class BrandModel
{
    public function getBrandById($brandId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = BrandQueries::getBrandById();
        $params = [$brandId];
        $brand = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $brand;
    }
    public function getAllBrands()
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = BrandQueries::getAllBrands();
        $brands = $dbController->request($database, $query);

        $dbController->disConnect($database);
        return $brands;
    }


    public function addBrand($name, $originCountry, $headquarter, $year, $brandPicture)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = BrandQueries::addBrand();
        $params = [$name, $originCountry, $headquarter, $year, $brandPicture];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }

    public function deleteBrand($brandId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = BrandQueries::deleteBrand();
        $params = [$brandId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function updateBrand($brandId, $name, $originCountry, $headquarter, $year, $brandPicture)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = BrandQueries::updateBrand();
        $params = [$name, $originCountry, $headquarter, $year, $brandPicture, $brandId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
}
