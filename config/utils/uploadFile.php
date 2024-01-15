<?php

class UploadFile
{
    public static $max_size = 4 * 1024 * 1024;
    public function uploadBrandFile()
    {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/CarLog/public/uploads/brands/";
        $uploadFile = $uploadDir . $_FILES["brandPicture"]["name"];
        $uploadOk = 1;

        $fileType = $_FILES["brandPicture"]["type"];
        $allowedTypes = ["image/jpeg", "image/png", "image/svg+xml", "image/jpg"];
        if (!in_array($fileType, $allowedTypes)) {
            $uploadOk = 0;
        }

        $maxFileSize = 6 * 1024 * 1024;
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
        $allowedTypes = ["image/jpeg", "image/png", "image/svg+xml", "image/jpg"];
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

    public function uploadNewsFile()
    {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/CarLog/public/uploads/news/";
        $uploadFile = $uploadDir . $_FILES["newsImage"]["name"];
        $uploadOk = 1;

        $fileType = $_FILES["newsImage"]["type"];
        $allowedTypes = ["image/jpeg", "image/png", "image/svg+xml", "image/jpg"];
        if (!in_array($fileType, $allowedTypes)) {
            $uploadOk = 0;
        }

        $maxFileSize = 4 * 1024 * 1024;
        if ($_FILES["newsImage"]["size"] > $maxFileSize) {
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["newsImage"]["tmp_name"], $uploadFile)) {
                return basename($_FILES["newsImage"]["name"]);
            }
        }

        return false;
    }

    public function uploadUserFile()
    {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/CarLog/public/uploads/users/";
        $uploadFile = $uploadDir . $_FILES["profilePicture"]["name"];
        $uploadOk = 1;

        $fileType = $_FILES["profilePicture"]["type"];
        $allowedTypes = ["image/jpeg", "image/png", "image/svg+xml", "image/jpg"];
        if (!in_array($fileType, $allowedTypes)) {
            $uploadOk = 0;
        }

        $maxFileSize = 4 * 1024 * 1024;
        if ($_FILES["profilePicture"]["size"] > $maxFileSize) {
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $uploadFile)) {
                return basename($_FILES["profilePicture"]["name"]);
            }
        }

        return false;
    }

    public function uploadSliderImage()
    {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/CarLog/public/uploads/slider/";
        $uploadFile = $uploadDir . $_FILES["sliderImage"]["name"];
        $uploadOk = 1;

        $fileType = $_FILES["sliderImage"]["type"];
        $allowedTypes = ["image/jpeg", "image/png", "image/svg+xml", "image/jpg"];
        if (!in_array($fileType, $allowedTypes)) {
            $uploadOk = 0;
        }

        $maxFileSize = 4 * 1024 * 1024;
        if ($_FILES["sliderImage"]["size"] > $maxFileSize) {
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["sliderImage"]["tmp_name"], $uploadFile)) {
                return basename($_FILES["sliderImage"]["name"]);
            }
        }

        return false;
    }


}