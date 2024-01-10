<?php
class ReviewQueries
{

    /** Brand Reviews Queries */
    const getBrandReviewById = "SELECT * FROM brandreviews WHERE id = ?";
    const getAllBrandReviews = "SELECT * FROM brandreviews";
    const getReviewsByBrand = "SELECT * FROM brandreviews WHERE brand_id = ?";
    const getValidReviewsByBrand = "SELECT * FROM brandreviews WHERE brand_id = ? AND status = 'VALID'";
    const getTopReviewsByBrand = "SELECT * FROM brandreviews WHERE brand_id = ? AND status = 'VALID' ORDER BY rating DESC LIMIT 3";
    const addBrandReview = "INSERT INTO brandreviews (user_id, brand_id, status, comment, rating) VALUES (?, ?, ?, ?, ?)";
    const updateBrandReview = "UPDATE brandreviews SET user_id = ?, brand_id = ?, status = ?, comment = ?, rating = ? WHERE id = ?";
    const deleteBrandReview = "DELETE FROM brandreviews WHERE id = ?";
    const validateBrandReview = "UPDATE brandreviews SET status = 'VALID' WHERE id = ?";
    const rejectBrandReview = "UPDATE brandreviews SET status = 'REJECTED' WHERE id = ?";
    const getNumberOfPendingBrandReviews = "SELECT COUNT(*) AS NB FROM brandreviews WHERE status = 'PENDING'";


    /** Vehicule Reviews Queries */
    const getVehiculeReviewById = "SELECT * FROM vehiculereviews WHERE id = ?";
    const getAllVehiculeReviews = "SELECT * FROM vehiculereviews";
    const getReviewsByVehicule = "SELECT * FROM vehiculereviews WHERE vehicule_id = ?";
    const getValidReviewsByVehicule = "SELECT * FROM vehiculereviews WHERE vehicule_id = ? AND status = 'VALID'";
    const getTopReviewsByVehicule = "SELECT * FROM vehiculereviews WHERE vehicule_id = ? AND status = 'VALID' ORDER BY rating DESC LIMIT 3";
    const addVehiculeReview = "INSERT INTO vehiculereviews (user_id, vehicule_id, status, comment, rating) VALUES (?, ?, ?, ?, ?)";
    const updateVehiculeReview = "UPDATE vehiculereviews SET user_id = ?, vehicule_id = ?, status = ?, comment = ?, rating = ? WHERE id = ?";
    const deleteVehiculeReview = "DELETE FROM vehiculereviews WHERE id = ?";
    const validateVehiculeReview = "UPDATE vehiculereviews SET status = 'VALID' WHERE id = ?";
    const rejectVehiculeReview = "UPDATE vehiculereviews SET status = 'REJECTED' WHERE id = ?";
    const getNumberOfPendingVehiculeReviews = "SELECT COUNT(*) AS NB FROM vehiculereviews WHERE status = 'PENDING'";
}