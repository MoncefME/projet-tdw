<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/userController.php");
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
                        <td class="table-action-btn">
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                            <button class="btn btn-warning">Reject</button>
                            <button class="btn btn-success">Accept</button>
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


