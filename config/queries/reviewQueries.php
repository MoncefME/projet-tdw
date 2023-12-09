<?php
class ReviewQueries
{
    /** Brand Reviews Queries */
    public static function getBrandReviewById()
    {
        return "SELECT * FROM brandreviews WHERE id = ?";
    }

    public static function getAllBrandReviews()
    {
        return "SELECT * FROM brandreviews";
    }

    public static function getReviewsByBrand()
    {
        return "SELECT * FROM brandreviews WHERE brand_id = ?";
    }

    public static function addBrandReview()
    {
        return "INSERT INTO brandreviews (user_id, brand_id, status, comment, rating) VALUES (?, ?, ?, ?, ?)";
    }

    public static function updateBrandReview()
    {
        return "UPDATE brandreviews SET user_id = ?, brand_id = ?, status = ?, comment = ?, rating = ? WHERE id = ?";
    }

    public static function deleteBrandReview()
    {
        return "DELETE FROM brandreviews WHERE id = ?";
    }

    public static function validateBrandReview()
    {
        return "UPDATE brandreviews SET status = 'VALID' WHERE id = ?";
    }

    public static function rejectBrandReview()
    {
        return "UPDATE brandreviews SET status = 'REJECTED' WHERE id = ?";
    }

    /** Vehicule Reviews Queries */
    public static function getVehiculeReviewById()
    {
        return "SELECT * FROM vehiculereviews WHERE id = ?";
    }

    public static function getAllVehiculeReviews()
    {
        return "SELECT * FROM vehiculereviews";
    }

    public static function getReviewsByVehicule()
    {
        return "SELECT * FROM vehiculereviews WHERE vehicule_id = ?";
    }

    public static function addVehiculeReview()
    {
        return "INSERT INTO vehiculereviews (user_id, vehicule_id, status, comment, rating) VALUES (?, ?, ?, ?, ?)";
    }

    public static function updateVehiculeReview()
    {
        return "UPDATE vehiculereviews SET user_id = ?, vehicule_id = ?, status = ?, comment = ?, rating = ? WHERE id = ?";
    }

    public static function deleteVehiculeReview()
    {
        return "DELETE FROM vehiculereviews WHERE id = ?";
    }

    public static function validateVehiculeReview()
    {
        return "UPDATE vehiculereviews SET status = 'VALID' WHERE id = ?";
    }

    public static function rejectVehiculeReview()
    {
        return "UPDATE vehiculereviews SET status = 'REJECTED' WHERE id = ?";
    }
}
