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
                if (isset($_GET['userId'])) {
                    $this->showUserInformations($_GET['userId']);
                } else {
                    $this->showUsersTable();
                }
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
            <table id="userTable" data-toggle="table" data-pagination="true" data-search="true" class="table  table-striped table-borderless  table-hover" data-page-size="4">
                <thead class="thead-light">
                    <tr>
                        <th data-field="full_name" data-sortable="true">Full Name</th>
                        <th data-field="username" data-sortable="true">Username</th>
                        <th data-field="role" data-sortable="true">Role</th>
                        <th data-field="sex" data-sortable="true">Sex</th>
                        <th data-field="birth_date" data-sortable="true">Birth Date</th>
                        <th data-field="picture">Picture</th>
                        <th data-field="status" data-sortable="true">Status</th>
                        <th data-field="actions">Action</th>
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
                                <?php echo $user['username'] ?>
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
                                <img src="<?= ImageUtility::getUserProfilePicture($user); ?>" alt="profile picture" width="50px" height="50px">
                            </td>
                            <td>
                                <p class="badge <?= $user['status'] === 'PENDING' ? 'badge-warning' : ($user['status'] === 'VALID' ? 'badge-success' : 'badge-danger') ?>">
                                    <?= $user['status'] ?>
                                </p>
                            </td>
                            <td class="table__action__btn">
                                <?php if ($user['id'] != $_SESSION['USER']['id']) { ?>
                                    <a href="/CarLog/admin/manageUsersPage/?userId=<?= $user['id'] ?>" class="btn btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
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

    private function showUserInformations($userId)
    {
        $userController = new UserController();
        $user = $userController->getUserById($userId);
    ?>
        <div >
            <div >

                <h3>Full Name: <?= $user['firstName'] . " " . $user['lastName'] ?></h3>
                <h3>Username: <?= $user['username'] ?></h3>
                <h3 class="badge <?= $user['role'] === 'ADMIN' ? 'badge-primary' : 'badge-secondary' ?>">
                    <?= $user['role'] ?>
                </h3>
    
                <div>
                    <button class="btn btn-danger" onclick="deleteUser(<?php echo $user['id'] ?>)">
                        <i class="fas fa-trash"></i>
                    </button>
                    <button class="btn btn-warning" onclick="rejectUser(<?php echo $user['id'] ?>)">
                        <i class="fas fa-times"></i>
                    </button>
                    <button class="btn btn-success" onclick="validateUser(<?php echo $user['id'] ?>)">
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </div>
            <div >
            <img src="<?= ImageUtility::getUserProfilePicture($user); ?>" alt="profile picture" width="100px" height="auto">
            </div>
            
        </div>
<?php
    }
}
