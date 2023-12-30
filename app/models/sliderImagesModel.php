<?php
class SliderImages
{
    // public function getAllSliderImages()
    // {
    //     $dbController = new DatabaseController();
    //     $database = $dbController->connect();

    //     $query = SliderImagesQueries::getAllSliderImages();
    //     $sliderImages = $dbController->request($database, $query);

    //     $dbController->disConnect($database);
    //     return $sliderImages;
    // }
    // public function addSliderImage($title, $content, $link, $tags)
    // {
    //     $dbController = new DatabaseController();
    //     $database = $dbController->connect();

    //     $query = SliderImagesQueries::addSliderImage();
    //     $current_time = date("Y-m-d H:i:s");
    //     $params = [$title, $content, $link, $tags, $current_time, $current_time];
    //     $success = $dbController->request($database, $query, $params);

    //     $dbController->disConnect($database);
    //     return $success !== false;
    // }
}