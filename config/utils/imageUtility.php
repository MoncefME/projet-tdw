<?php
class ImageUtility
{
    public static function getUserProfilePicture($user)
    {
        $profilePicture = $user['profilePicture'];
        $picturePath = "/CarLog/public/uploads/users/" . $profilePicture;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $picturePath)) {
            $pictureUrl = $picturePath;
        } else {
            $pictureUrl = "/CarLog/public/images/defaults/user.png";
        }
        return $pictureUrl;
    }

    public static function getBrandLogo($brand)
    {
        $logo = $brand['brandPicture'];
        $logoPath = "/CarLog/public/uploads/brands/" . $logo;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $logoPath)) {
            $logoUrl = $logoPath;
        } else {
            $logoUrl = "/CarLog/public/images/defaults/brand.png";
        }
        return $logoUrl;
    }

    public static function getVehiculePicture($vehicule)
    {
        $picture = $vehicule['vehiculePicture'];
        $picturePath = "/CarLog/public/uploads/vehicules/" . $picture;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $picturePath)) {
            $pictureUrl = $picturePath;
        } else {
            $pictureUrl = "/CarLog/public/images/defaults/vehicule.png";
        }
        return $pictureUrl;
    }

    public static function getNewsPicture($news)
    {
        $picture = $news['title'];
        $picturePath = "/CarLog/public/uploads/news/" . $picture;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $picturePath)) {
            $pictureUrl = $picturePath;
        } else {
            $pictureUrl = "/CarLog/public/images/defaults/new.png";
        }
        return $pictureUrl;
    }

    public static function getSliderImage($sliderImage){
        $picture = $sliderImage['image_url'];
        $picturePath = "/CarLog/public/uploads/slider/" . $picture;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $picturePath)) {
            $pictureUrl = $picturePath;
        } else {
            $pictureUrl = "/CarLog/public/images/defaults/slider.jpg";
        }
        return $pictureUrl;
    }

}