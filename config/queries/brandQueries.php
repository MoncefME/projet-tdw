<?php
class BrandQueries
{
    const getBrandById = "SELECT * FROM brands WHERE id = ?";
    const getAllBrands = "SELECT * FROM brands";
    const addBrand = "INSERT INTO brands (name, originCountry, headquarter, year, brandPicture, description) 
        VALUES                     (  ? ,       ?      ,      ?     ,  ?  ,       ?     ,     ?)";
    const deleteBrand = "DELETE FROM brands WHERE id = ?";
    const updateBrand = "UPDATE brands SET name = ?, originCountry = ?, headquarter = ?, year = ?, brandPicture = ?, description = ? WHERE id = ?";

}