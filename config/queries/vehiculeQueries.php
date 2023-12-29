<?php

class VehiculeQueries
{
    public static function getVehiculeById()
    {
        return "SELECT * FROM vehicules WHERE id = ?";
    }

    public static function getAllVehicules()
    {
        return "SELECT * FROM vehicules";
    }

    public static function getVehiculesByBrand()
    {
        return "SELECT * FROM vehicules WHERE brand_id = ?";
    }

    public static function addVehicule()
    {
        return "INSERT INTO vehicules (model, version, year, vehiculePicture, length, width, height, wheelBase, engine, performance, price, consumption, brand_id,note) 
                VALUES                (  ?  ,    ?   ,   ? ,       ?        ,   ?   ,   ?  ,   ?   ,     ?    ,   ?   ,      ?     ,   ?  ,      ?     ,   ? ,    ?    )";
    }

    public static function deleteVehicule()
    {
        return "DELETE FROM vehicules WHERE id = ?";
    }

    public static function updateVehicule()
    {
        return "UPDATE vehicules SET model = ?,
                                     version = ?,
                                     year = ?,
                                     vehiculePicture = ?,
                                     length = ?,
                                     width = ?,
                                     height = ?,
                                     wheelBase = ?, 
                                     engine = ?, 
                                     performance = ?, 
                                     price = ?, 
                                     consumption = ?, 
                                     note = ?,
                                     brand_id = ? 
                WHERE id = ?";
    }

    public static function getModelsByBrandId()
    {
        return "SELECT model FROM vehicules WHERE brand_id = ?";
    }
    public static function getYearsByBrandAndModel()
    {
        return "SELECT year FROM vehicules WHERE brand_id = ? AND model = ?";
    }

    public static function getVehiculeByBrandModelYear()
    {
        return "SELECT * FROM vehicules WHERE brand_id = ? AND model = ? AND year = ?";
    }

}
