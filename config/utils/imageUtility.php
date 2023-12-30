<?php
class ImageUtility
{
    public function getUserProfilePicture($user)
    {
        $profilePicture = $user['profilePicture'];
        $picturePath = "/CarLog/public/uploads/users/" . $profilePicture;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $picturePath)) {
            $pictureUrl = $picturePath;
        } else {
            $pictureUrl = "/CarLog/public/uploads/users/default.png";
        }
        return $pictureUrl;
    }

    public function getBrandLogo($brand)
    {
        $logo = $brand['brandPicture'];
        $logoPath = "/CarLog/public/uploads/brands/" . $logo;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $logoPath)) {
            $logoUrl = $logoPath;
        } else {
            $logoUrl = "/CarLog/public/uploads/brands/default.png";
        }
        return $logoUrl;
    }

    public function getVehiculePicture($vehicule)
    {
        $picture = $vehicule['vehiculePicture'];
        $picturePath = "/CarLog/public/uploads/vehicules/" . $picture;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $picturePath)) {
            $pictureUrl = $picturePath;
        } else {
            $pictureUrl = "/CarLog/public/uploads/vehicules/default.png";
        }
        return $pictureUrl;
    }

    public function getNewsPicture($news)
    {
        $picture = $news['newsPicture'];
        $picturePath = "/CarLog/public/uploads/news/" . $picture;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $picturePath)) {
            $pictureUrl = $picturePath;
        } else {
            $pictureUrl = "/CarLog/public/uploads/news/default.png";
        }
        return $pictureUrl;
    }

}