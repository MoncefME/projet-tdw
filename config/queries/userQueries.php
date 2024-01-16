<?php
class UserQueries
{
    const getUserById = "SELECT * FROM users WHERE id = ?";
    const loginUser = "SELECT * FROM users where username = ?";
    const getAllUsers = "SELECT * FROM users where id != ?";
    const getUsersByPage = "SELECT * FROM users WHERE id != ? LIMIT ?, 5";
    const addUser = "INSERT INTO users (password, username, firstName, lastName, role, birthDate, sex, status, profilePicture) VALUES (   ?    ,   ?  ,     ?    ,     ?   ,  ?  ,     ?    ,  ? ,   ?   ,       ?       )";
    const deleteUser = "DELETE FROM users WHERE id = ?";
    const updateUserInfo = "UPDATE users SET  username = ?, firstName = ?, lastName = ?, birthDate = ?, profilePicture = ? WHERE id = ?";
    const validateUser = "UPDATE users SET status = 'VALID' WHERE id = ?";
    const rejectUser = "UPDATE users SET status = 'REJECTED' WHERE id = ?";
    const updateUserRole = "UPDATE users SET role = ? WHERE id = ?";
    const getUserFavoriteVehicules = "SELECT * FROM vehicules WHERE id IN (SELECT vehicule_id FROM userFavoriteVehicules WHERE user_id = ?)";
    const addFavoriteVehicule = "INSERT INTO userFavoriteVehicules (user_id, vehicule_id) VALUES (?, ?)";
    const deleteFavoriteVehicule = "DELETE FROM userFavoriteVehicules WHERE user_id = ? AND vehicule_id = ?";
    const isVehicleLikedByUser = "SELECT COUNT(*) AS NB FROM userFavoriteVehicules WHERE user_id = ? AND vehicule_id = ?";
    const getNumberOfPendingUsers = "SELECT COUNT(*) AS NB FROM users WHERE status = 'PENDING'";
    const getUserReviews = "SELECT * FROM vehiculereviews WHERE user_id = ?";
}
