<?php

class VehiculeQueries
{
    const getVehiculeById = "SELECT * FROM vehicules WHERE id = ?";
    const getAllVehicules = "SELECT * FROM vehicules";
    const getVehiculesByBrand = "SELECT * FROM vehicules WHERE brand_id = ?";
    const addVehicule = "INSERT INTO vehicules (model, version, year, vehiculePicture, length, width, height, wheelBase, engine, performance, price, consumption, brand_id,note) VALUES                (  ?  ,    ?   ,   ? ,       ?        ,   ?   ,   ?  ,   ?   ,     ?    ,   ?   ,      ?     ,   ?  ,      ?     ,   ? ,    ?    )";
    const deleteVehicule = "DELETE FROM vehicules WHERE id = ?";
    const updateVehicule = "UPDATE vehicules SET model = ?,
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
    const getModelsByBrandId = "SELECT model FROM vehicules WHERE brand_id = ?";
    const getVehiculeByBrandModelYear = "SELECT * FROM vehicules WHERE brand_id = ? AND model = ? AND year = ?";
    const getAllVehiculesPerPage = "SELECT * FROM vehicules LIMIT ?, ? ";
    const getAllVehiculesWithRating = "SELECT v.*, round(AVG(r.rating),1) AS average_rating FROM vehicules v LEFT JOIN vehiculereviews r ON v.id = r.vehicule_id WHERE r.status = 'VALID'GROUP BY v.id;";
}

