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

        $name = FormValidation::validateInput('name');
        $originCountry = FormValidation::validateInput('originCountry');
        $headquarter = FormValidation::validateInput('headquarter');
        $year = FormValidation::validateInput('year');
        $description = FormValidation::validateInput('description');

        $uploadHandler = new UploadFile();
        $uploadedFileName = $uploadHandler->uploadBrandFile();

        return $uploadedFileName ? $brandModel->addBrand($name, $originCountry, $headquarter, $year, $uploadedFileName,$description) : false;
    }

    public function deleteBrand($brandId)
    {
        $brandModel = new BrandModel();
        return $brandModel->deleteBrand($brandId);
    }

    public function updateBrand($brandId)
    {
        $brandModel = new BrandModel();

        $name = FormValidation::validateInput('name');
        $originCountry = FormValidation::validateInput('originCountry');
        $headquarter = FormValidation::validateInput('headquarter');
        $year = FormValidation::validateInput('year');
        $description = FormValidation::validateInput('description');

        $uploadHandler = new UploadFile();
        $uploadedFileName = $uploadHandler->uploadBrandFile();

        if (!$uploadedFileName) {
            $uploadedFileName = FormValidation::validateInput('currentPicture');
        }

        return $brandModel->updateBrand($brandId, $name, $originCountry, $headquarter, $year, $uploadedFileName,$description);
    }
}
