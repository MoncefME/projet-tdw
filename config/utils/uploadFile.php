<?php

class UploadFile
{

    public function uploadBrandFile()
    {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/CarLog/public/uploads/brands/";
        $uploadFile = $uploadDir . $_FILES["brandPicture"]["name"];
        $uploadOk = 1;

        $fileType = $_FILES["brandPicture"]["type"];
        $allowedTypes = ["image/jpeg", "image/png", "image/svg+xml"];
        if (!in_array($fileType, $allowedTypes)) {
            $uploadOk = 0;
        }

        $maxFileSize = 2 * 1024 * 1024;
        if ($_FILES["brandPicture"]["size"] > $maxFileSize) {
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["brandPicture"]["tmp_name"], $uploadFile)) {
                return basename($_FILES["brandPicture"]["name"]);
            }
        }

        return false;
    }

    public function uploadVehiculeFile()
    {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/CarLog/public/uploads/vehicules/";
        $uploadFile = $uploadDir . $_FILES["vehiculePicture"]["name"];
        $uploadOk = 1;

        $fileType = $_FILES["vehiculePicture"]["type"];
        $allowedTypes = ["image/jpeg", "image/png", "image/svg+xml"];
        if (!in_array($fileType, $allowedTypes)) {
            $uploadOk = 0;
        }

        $maxFileSize = 4 * 1024 * 1024;
        if ($_FILES["vehiculePicture"]["size"] > $maxFileSize) {
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["vehiculePicture"]["tmp_name"], $uploadFile)) {
                return basename($_FILES["vehiculePicture"]["name"]);
            }
        }

        return false;
    }





}