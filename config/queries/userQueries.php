<?php
class UserQueries
{
    public static function getUserById()
    {
        return "SELECT * FROM users WHERE id = ?";
    }

    public static function loginUser()
    {
        return "SELECT * FROM users where email = ?";
    }

    public static function getAllUsers()
    {
        return "SELECT * FROM users";
    }

    public static function addUser()
    {
        return "INSERT INTO users (password, email, firstName, lastName, role, birthDate, sex, status, profilePicture) 
                VALUES            (   ?    ,   ?  ,     ?    ,     ?   ,  ?  ,     ?    ,  ? ,   ?   ,       ?       )";
    }

    public static function deleteUser()
    {
        return "DELETE FROM users WHERE id = ?";
    }

    public static function updateUserInfo()
    {
        return "UPDATE users SET  email = ?, firstName = ?, lastName = ?, birthDate = ?, profilePicture = ? WHERE id = ?";
    }

    public static function validateUser()
    {
        return "UPDATE users SET status = 'VALID' WHERE id = ?";
    }

    public static function rejectUser()
    {
        return "UPDATE users SET status = 'REJECTED' WHERE id = ?";
    }

    public static function updateUserRole()
    {
        return "UPDATE users SET role = ? WHERE id = ?";
    }

    public static function getUserFavoriteVehicules()
    {
        return "SELECT * FROM vehicules WHERE id IN (SELECT vehicule_id FROM userFavoriteVehicules WHERE user_id = ?)";
    }
    public static function addFavoriteVehicule()
    {
        return "INSERT INTO userFavoriteVehicules (user_id, vehicule_id) VALUES (?, ?)";
    }
    public static function deleteFavoriteVehicule()
    {
        return "DELETE FROM userFavoriteVehicules WHERE user_id = ? AND vehicule_id = ?";
    }
    public static function isVehicleLikedByUser()
    {
        return "SELECT COUNT(*) AS NB FROM userFavoriteVehicules WHERE user_id = ? AND vehicule_id = ?";
    }

}
