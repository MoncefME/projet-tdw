<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/Config/queries/userQueries.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/databaseController.php');
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
    public function loginUser($email, $password)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = UserQueries::loginUser();
        $params = [$email];

        $userMatchingEmail = $dbController->request($database, $query, $params);
        $dbController->disConnect($database);

        if ($userMatchingEmail !== false && count($userMatchingEmail) > 0) {
            $user = $userMatchingEmail[0];

            switch ($user['status']) {
                case 'VALID':
                    if (password_verify($password, $user['password'])) {
                        unset($user['password']);
                        $response = [
                            'status' => 200,
                            'message' => 'Login successful!',
                            'user' => $user
                        ];
                    } else {
                        $response = [
                            'status' => 401,
                            'message' => 'Incorrect password'
                        ];
                    }
                    break;

                case 'PENDING':
                    $response = [
                        'status' => 201,
                        'message' => 'Wait until the admin validates your account!'
                    ];
                    break;

                default:
                    $response = [
                        'status' => 403,
                        'message' => 'Account Banned!'
                    ];
                    break;
            }
        } else {
            $response = [
                'status' => 404,
                'message' => 'User not found or database error.'
            ];
        }

        return $response;
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

        if ($success !== false) {
            $response = [
                'status' => 200,
                'message' => 'Registration successful. Wait until the admin approves your registration.'
            ];
        } else {
            $response = [
                'status' => 200,
                'message' => 'Registration successful. Wait until the admin approves your registration.'
            ];
        }

        $dbController->disConnect($database);
        return $response;
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
    public function getUserFavoriteVehicules($userId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = UserQueries::getUserFavoriteVehicules();
        $params = [$userId];
        $userFavoriteVehicules = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $userFavoriteVehicules;
    }
    public function addFavoriteVehicule($userId, $vehiculeId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = UserQueries::addFavoriteVehicule();
        // remove like
        $qury2 = UserQueries::deleteFavoriteVehicule();
        $params = [$userId, $vehiculeId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }
    public function deleteFavoriteVehicule($userId, $vehiculeId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = UserQueries::deleteFavoriteVehicule();
        $params = [$userId, $vehiculeId];
        $success = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $success !== false;
    }

    public function isVehicleLikedByUser($userId, $vehiculeId)
    {
        $dbController = new DatabaseController();
        $database = $dbController->connect();

        $query = UserQueries::isVehicleLikedByUser();
        $params = [$userId, $vehiculeId];
        $result = $dbController->request($database, $query, $params);

        $dbController->disConnect($database);
        return $result[0]['NB'] > 0;
    }


}

