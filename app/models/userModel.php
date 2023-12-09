<?php
class UserModel
{
    public function getUserById($userId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = UserQueries::getUserById();
        $params = [$userId];
        $user = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $user;
    }
    public function getAllUsers()
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = UserQueries::getAllUsers();
        $users = $dbController->request($database, $query);

        $dbController->disConnect($database);
        return $users;
    }
    public function addUser($password, $email, $firstName, $lastName, $role, $birthDate, $sex, $status, $profilPicture)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = UserQueries::addUser();
        $params = [$password, $email, $firstName, $lastName, $role, $birthDate, $sex, $status, $profilPicture];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function deleteUser($userId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = UserQueries::deleteUser();
        $params = [$userId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function updateUserInfo($userId, $password, $email, $firstName, $lastName, $birthDate, $sex, $profilePicture)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = UserQueries::updateUserInfo();
        $params = [$password, $email, $firstName, $lastName, $birthDate, $sex, $profilePicture, $userId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function validateUser($userId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = UserQueries::validateUser();
        $params = [$userId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function rejectUser($userId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = UserQueries::rejectUser();
        $params = [$userId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function updateUserRole($userId, $newRole)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = UserQueries::updateUserRole();
        $params = [$userId, $newRole];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
}
