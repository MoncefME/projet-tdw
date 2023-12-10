<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/models/userModel.php');
class UserController
{
    public function getUserById($userId)
    {
        $userModel = new UserModel();
        $user = $userModel->getUserById($userId);
        return $user;
    }

    public function loginUser()
    {
        $userModel = new UserModel();

        // $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
        // $password = isset($_POST['password']) ? $_POST['password'] : '';
        $password = $_POST['password'] ?? null;
        $email = $_POST['email'] ?? null;

        $success = $userModel->loginUser($email, $password);
        return $success;
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

        $success = $userModel->addUser($password, $email, $firstName, $lastName, $role, $birthDate, $sex, $status, $profilePicture);
        return $success;
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
        $success = $userModel->validateUser($userId);
        return $success;
    }

    public function rejectUser($userId)
    {
        $userModel = new UserModel();
        $success = $userModel->rejectUser($userId);
        return $success;
    }

    public function updateUserRole($userId)
    {
        $userModel = new UserModel();
        $role = isset($_POST['role']) ? $_POST['role'] : 'USER';
        $success = $userModel->updateUserRole($userId, $role);
        return $success;
    }
}
