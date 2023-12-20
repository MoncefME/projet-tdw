<?php

class UploadFile
{

    private function sanitizeFileName($fileName)
    {
        $sanitizedFileName = preg_replace("/[^a-zA-Z0-9.]/", "", $fileName);
        return $sanitizedFileName;
    }
    public function uploadBrandFile()
    {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/CarLog/public/uploads/brands/";
        $uploadFile = $uploadDir . $this->sanitizeFileName($_FILES["brandPicture"]["name"]);
        $uploadOk = 1;

        $fileType = $_FILES["brandPicture"]["type"];
        $allowedTypes = ["image/jpeg", "image/png"];
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





}