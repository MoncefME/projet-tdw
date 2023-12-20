<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/brandModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/config/utils/uploadFile.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/config/utils/formValidation.php');
class BrandController
{
    public function getBrandById($brandId)
    {
        $brandModel = new BrandModel();
        return $brandModel->getBrandById($brandId);
    }

    public function getAllBrands()
    {
        $brandModel = new BrandModel();
        return $brandModel->getAllBrands();
    }

    public function addBrand()
    {
        $brandModel = new BrandModel();
        $formValidation = new FormValidation();

        $name = $formValidation->validateInput('name');
        $originCountry = $formValidation->validateInput('originCountry');
        $headquarter = $formValidation->validateInput('headquarter');
        $year = $formValidation->validateInput('year');

        $uploadHandler = new UploadFile();
        $uploadedFileName = $uploadHandler->uploadBrandFile();

        return $uploadedFileName ? $brandModel->addBrand($name, $originCountry, $headquarter, $year, $uploadedFileName) : false;
    }

    public function deleteBrand($brandId)
    {
        $brandModel = new BrandModel();
        return $brandModel->deleteBrand($brandId);
    }

    public function updateBrand($brandId)
    {
        $brandModel = new BrandModel();
        $formValidation = new FormValidation();

        $name = $formValidation->validateInput('name');
        $originCountry = $formValidation->validateInput('originCountry');
        $headquarter = $formValidation->validateInput('headquarter');
        $year = $formValidation->validateInput('year');
        $brandPicture = $formValidation->validateInput('brandPicture');

        return $brandModel->updateBrand($brandId, $name, $originCountry, $headquarter, $year, $brandPicture);
    }
}
