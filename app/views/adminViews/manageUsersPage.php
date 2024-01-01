<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/userController.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/config/utils/imageUtility.php");
class ManageUsersPage
{
    public function showPage()
    {
        $sharedView = new SharedViews();
        ?>
        <div class="dashboard__page">
            <?php
            $sharedView->adminSideBar();
            ?>
            <div class="dashboard__content">
                <div class="dashboard__header-users">
                    <h1>Manage Users</h1>
                </div>
                <?php
                $this->showUsersTable();
                ?>
            </div>
        </div>
        <?php
    }


    private function showUsersTable()
    {
        $userController = new UserController();
        $users = $userController->getAllUsers();
        ?>
        <div class="users__table">
            <table class="table table-hover " id="userTable">
                <thead class="thead-light">
                    <tr>
                        <th>Full Name</th>
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
                                <?php echo $user['firstName'] . " " . $user['lastName'] ?>
                            </td>
                            <td>
                                <?php echo $user['email'] ?>
                            </td>
                            <td>
                                <p class="badge <?= $user['role'] === 'ADMIN' ? 'badge-primary' : 'badge-secondary' ?>">
                                    <?= $user['role'] ?>
                                </p>

                            </td>
                            <td>
                                <p class="badge <?= $user['sex'] === 'MALE' ? 'badge-info' : 'badge-danger' ?>">
                                    <?= $user['sex'] ?>
                                </p>
                            </td>
                            <td>
                                <?php echo $user['birthDate'] ?>
                            </td>
                            <td>
                                <img src="<?= ImageUtility::getUserProfilePicture($user); ?>" alt="profile picture" width="50px"
                                    height="50px">
                            </td>
                            <td>
                                <p
                                    class="badge <?= $user['status'] === 'PENDING' ? 'badge-warning' : ($user['status'] === 'VALID' ? 'badge-success' : 'badge-danger') ?>">
                                    <?= $user['status'] ?>
                                </p>
                            </td>
                            <td class="table__action__btn">
                                <?php if ($user['id'] != $_SESSION['USER']['id']) { ?>
                                    <button class="btn btn-danger" onclick="deleteUser(<?php echo $user['id'] ?>)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button class="btn btn-warning" onclick="rejectUser(<?php echo $user['id'] ?>)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <button class="btn btn-success" onclick="validateUser(<?php echo $user['id'] ?>)">
                                        <i class="fas fa-check"></i>
                                    </button>
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
        </div>
        <?php
    }


}


