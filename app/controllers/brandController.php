<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/brandModel.php');
class BrandController
{
    public function getBrandById($brandId)
    {
        $brandModel = new BrandModel();
        $brand = $brandModel->getBrandById($brandId);
        return $brand;
    }

    public function getAllBrands()
    {
        $brandModel = new BrandModel();
        $brands = $brandModel->getAllBrands();
        return $brands;
    }

    public function addBrand()
    {
        $brandModel = new BrandModel();

        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $originCountry = isset($_POST['originCountry']) ? $_POST['originCountry'] : '';
        $headquarter = isset($_POST['headquarter']) ? $_POST['headquarter'] : '';
        $year = isset($_POST['year']) ? $_POST['year'] : '';
        $brandPicture = isset($_POST['brandPicture']) ? $_POST['brandPicture'] : '';

        $success = $brandModel->addBrand($name, $originCountry, $headquarter, $year, $brandPicture);
        return $success;
    }

    public function deleteBrand($brandId)
    {
        $brandModel = new BrandModel();
        $success = $brandModel->deleteBrand($brandId);
        return $success;
    }

    public function updateBrand($brandId)
    {
        $brandModel = new BrandModel();

        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $originCountry = isset($_POST['originCountry']) ? $_POST['originCountry'] : '';
        $headquarter = isset($_POST['headquarter']) ? $_POST['headquarter'] : '';
        $year = isset($_POST['year']) ? $_POST['year'] : '';
        $brandPicture = isset($_POST['brandPicture']) ? $_POST['brandPicture'] : '';

        $success = $brandModel->updateBrand($brandId, $name, $originCountry, $headquarter, $year, $brandPicture);
        return $success;
    }
}
