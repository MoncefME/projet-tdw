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
        return "UPDATE users SET password = ?, email = ?, firstName = ?, lastName = ?, birthDate = ?, sex = ?, profilePicture = ? WHERE id = ?";
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
}
