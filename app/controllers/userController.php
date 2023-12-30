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
        $formValidation = new FormValidation();

        $password = $formValidation->validateInput('password');
        $email = $formValidation->validateInput('email');

        $response = $userModel->loginUser($email, $password);

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
        $users = $userModel->getAllUsers();
        return $users;
    }

    public function addUser()
    {
        $userModel = new UserModel();
        $formValidation = new FormValidation();

        $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
        $email = $formValidation->validateInput('email');
        $firstName = $formValidation->validateInput('firstName');
        $lastName = $formValidation->validateInput('lastName');
        $role = isset($_POST['role']) ? $_POST['role'] : 'USER';
        $birthDate = $formValidation->validateInput('birthDate');
        $sex = $formValidation->validateInput('sex');
        $status = 'PENDING';
        //$profilePicture = isset($_POST['profilePicture']) ? $_POST['profilePicture'] : '';

        $uploadHandler = new UploadFile();
        $uploadedFileName = $uploadHandler->uploadUserFile();

        if (!$uploadedFileName) {
            $uploadedFileName = 'default.png';
        }
        $response = $userModel->addUser($password, $email, $firstName, $lastName, $role, $birthDate, $sex, $status, $uploadedFileName);

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
        $success = $userModel->deleteUser($userId);
        return $success;
    }

    public function updateUserInfo($userId)
    {
        $userModel = new UserModel();
        $formValidation = new FormValidation();

        //$password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;
        $email = $formValidation->validateInput('email');
        $firstName = $formValidation->validateInput('firstName');
        $lastName = $formValidation->validateInput('lastName');
        $birthDate = $formValidation->validateInput('birthDate');
        //$profilePicture = isset($_POST['profilePicture']) ? $_POST['profilePicture'] : '';

        $uploadHandler = new UploadFile();
        $uploadedFileName = $uploadHandler->uploadUserFile();

        if (!$uploadedFileName) {
            echo 'no file uploaded';
            $uploadedFileName = $formValidation->validateInput('currentPicture');
        }

        $success = $userModel->updateUserInfo($userId, $email, $firstName, $lastName, $birthDate, $uploadedFileName);
        return $success;
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

    public function updateUserRole($userId)
    {
        $userModel = new UserModel();
        $role = isset($_POST['role']) ? $_POST['role'] : 'USER';
        return $userModel->updateUserRole($userId, $role);
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



}
