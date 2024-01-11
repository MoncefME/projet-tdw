<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/userModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/config/utils/uploadFile.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/config/utils/formValidation.php');
class UserController
{
    public function getUserById($userId)
    {
        $userModel = new UserModel();
        return $userModel->getUserById($userId);
    }

    public function loginUser()
    {
        $userModel = new UserModel();

        $password = FormValidation::validateInput('password');
        $username = FormValidation::validateInput('username');

        $response = $userModel->loginUser($username, $password);

        session_start();
        if ($response['status'] === 200) {
            $user = $response['user'];
            unset($user['password']);
            $_SESSION['USER'] = $user;
        } else {
            $_SESSION['LOGIN-MESSAGE'] = $response['message'];
        }
        return $response;
    }

    public function getAllUsers()
    {
        $userModel = new UserModel();
        $userId = $_SESSION['USER']['id'];
        return $userModel->getAllUsers($userId);
    }

    public function addUser()
    {
        $userModel = new UserModel();

        $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
        $username = FormValidation::validateInput('username');
        $firstName = FormValidation::validateInput('firstName');
        $lastName = FormValidation::validateInput('lastName');
        $role = isset($_POST['role']) ? $_POST['role'] : 'USER';
        $birthDate = FormValidation::validateInput('birthDate');
        $sex = FormValidation::validateInput('sex');
        $status = 'PENDING';

        $uploadHandler = new UploadFile();
        $uploadedFileName = $uploadHandler->uploadUserFile();

        if (!$uploadedFileName) {
            $uploadedFileName = 'default.png';
        }
        $response = $userModel->addUser($password, $username, $firstName, $lastName, $role, $birthDate, $sex, $status, $uploadedFileName);

        session_start();
        if ($response['status'] == 200) {
            $_SESSION['SIGNUP-MESSAGE'] = 'Registration successful. Wait until the admin approves your registration.';
        } else {
            $_SESSION['SIGNUP-MESSAGE'] = 'Error while signup';
        }

        return $response;
    }

    public function deleteUser($userId)
    {
        $userModel = new UserModel();
        return $userModel->deleteUser($userId);
    }

    public function updateUserInfo($userId)
    {
        $userModel = new UserModel();

        //$password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;
        $username = FormValidation::validateInput('username');
        $firstName = FormValidation::validateInput('firstName');
        $lastName = FormValidation::validateInput('lastName');
        $birthDate = FormValidation::validateInput('birthDate');

        $uploadHandler = new UploadFile();
        $uploadedFileName = $uploadHandler->uploadUserFile();

        if (!$uploadedFileName) {
            echo 'no file uploaded';
            $uploadedFileName = FormValidation::validateInput('currentPicture');
        }

        return $userModel->updateUserInfo($userId, $username, $firstName, $lastName, $birthDate, $uploadedFileName);
    }

    public function validateUser($userId)
    {
        $userModel = new UserModel();
        return $userModel->validateUser($userId);
    }

    public function rejectUser($userId)
    {
        $userModel = new UserModel();
        return $userModel->rejectUser($userId);
    }

    public function getUserFavoriteVehicules($userId)
    {
        $userModel = new UserModel();
        return $userModel->getUserFavoriteVehicules($userId);
    }
    public function addFavoriteVehicule($userId, $vehiculeId)
    {
        $userModel = new UserModel();
        return $userModel->addFavoriteVehicule($userId, $vehiculeId);
    }

    public function isVehicleLikedByUser($userId, $vehiculeId)
    {
        $userModel = new UserModel();
        return $userModel->isVehicleLikedByUser($userId, $vehiculeId);
    }

    public function deleteFavoriteVehicule($userId, $vehiculeId)
    {
        $userModel = new UserModel();
        return $userModel->deleteFavoriteVehicule($userId, $vehiculeId);
    }

    public function getNumberOfPendingUsers()
    {
        $userModel = new UserModel();
        return $userModel->getNumberOfPendingUsers();
    }

    // public function getMyReviews($userId)
    // {
    //     $userModel = new UserModel();
    //     return $userModel->getMyReviews($userId);
    // }
}
