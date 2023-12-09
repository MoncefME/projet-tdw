<?php
class BrandQueries
{
    public static function getBrandById()
    {
        return "SELECT * FROM brands WHERE id = ?";
    }
    public static function getAllBrands()
    {
        return "SELECT * FROM brands";
    }

    public static function addBrand()
    {
        return "INSERT INTO brands (name, originCountry, headquarter, year, brandPicture) 
        VALUES                     (  ? ,       ?      ,      ?     ,  ?  ,       ?     )";
    }

    public static function deleteBrand()
    {
        return "DELETE FROM brands WHERE id = ?";
    }

    public static function updateBrand()
    {
        return "UPDATE brands SET name = ?, originCountry = ?, headquarter = ?, year = ?, brandPicture = ? WHERE id = ?";
    }
}
