<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/userController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/config/utils/imageUtility.php");
class ManageUsersPage
{
    public function showPage()
    {
        ?>
        <div class="page">
            <p>Manage Users Page</p>
            <?php
            $sharedView = new SharedViews();
            $sharedView->adminSideBar();
            $this->showUsersTable();
            ?>
        </div>
        <?php
    }


    private function showUsersTable()
    {
        $userController = new UserController();
        $imageUtility = new ImageUtility();
        $users = $userController->getAllUsers();
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Sex</th>
                    <th>Birth Date</th>
                    <th>Picture</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($users as $user) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $user['firstName'] ?>
                        </td>
                        <td>
                            <?php echo $user['lastName'] ?>
                        </td>
                        <td>
                            <?php echo $user['email'] ?>
                        </td>
                        <td>
                            <?php echo $user['role'] ?>
                        </td>
                        <td>
                            <?php echo $user['sex'] ?>
                        </td>
                        <td>
                            <?php echo $user['birthDate'] ?>
                        </td>
                        <td>
                            <img src="<?= ImageUtility::getUserProfilePicture($user); ?>" alt="profile picture" width="50px"
                                height="50px">
                        </td>
                        <td>
                            <p class="<?php echo $user['status'] ?>">
                                <?php echo $user['status'] ?>
                            </p>
                        </td>
                        <td class="table-action-btn">
                            <?php if ($user['id'] != $_SESSION['USER']['id']) { ?>
                                <button class="btn btn-danger" onclick="deleteUser(<?php echo $user['id'] ?>)">Delete</button>
                                <button class="btn btn-warning" onclick="rejectUser(<?php echo $user['id'] ?>)">Reject</button>
                                <button class="btn btn-success" onclick="validateUser(<?php echo $user['id'] ?>)">Accept</button>
                            <?php } else { ?>
                                <p>YOU!!</p>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
}


