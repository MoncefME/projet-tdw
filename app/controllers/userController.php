<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/userModel.php');
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

        $password = $_POST['password'] ?? null;
        $email = $_POST['email'] ?? null;

        $response = $userModel->loginUser($email, $password);

        session_start();
        if ($response['status'] === 200) {
            $user = $response['user'];
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

        $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
        $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
        $role = isset($_POST['role']) ? $_POST['role'] : 'USER';
        $birthDate = isset($_POST['birthDate']) ? $_POST['birthDate'] : '';
        $sex = isset($_POST['sex']) ? $_POST['sex'] : '';
        $status = 'PENDING';
        $profilePicture = isset($_POST['profilePicture']) ? $_POST['profilePicture'] : '';

        $response = $userModel->addUser($password, $email, $firstName, $lastName, $role, $birthDate, $sex, $status, $profilePicture);

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

        $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
        $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
        $birthDate = isset($_POST['birthDate']) ? $_POST['birthDate'] : '';
        $sex = isset($_POST['sex']) ? $_POST['sex'] : '';
        $profilePicture = isset($_POST['profilePicture']) ? $_POST['profilePicture'] : '';

        $success = $userModel->updateUserInfo($userId, $password, $email, $firstName, $lastName, $birthDate, $sex, $profilePicture);
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
}
