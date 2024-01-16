<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/userController.php");
class ProfilePage
{

    public function showPage()
    {
?>
        <div class="page__content">
            <?php
            $shardViews = new SharedViews();
            $shardViews->showHeader();
            $shardViews->showNavBar();
            $this->showUserInformation();
            if (isset($_SESSION['USER']))
                $this->showUserFavoriteVehicules();
            $shardViews->showFooter();
            ?>
        </div>
    <?php
    }
    private function showUserInformation()
    {
        // $user = $_SESSION['USER'];
        $userController = new UserController();
        $user = $userController->getUserById($_SESSION['USER']['id']);
        $_SESSION['USER'] = $user;
    ?>
        <div class="user__profile__container">
            <div class="profile__header">
                <h1>Profile</h1>
                <img src="<?= ImageUtility::getUserProfilePicture($user); ?>" alt="Profile Picture" style="width: auto; height: 100px;">
            </div>
            <form class="edit-user-infos__form" action="<?= ApiRouter::EDIT_USER_INFOS ?>" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="username">username:</label>
                    <input type="text" id="username" name="username" value="<?= $user['username']; ?>"><br>
                </div>
                <div class="user__badges">
                    <div>
                        <label for="role">Role:</label>
                        <p class="badge <?= $user['role'] === 'ADMIN' ? 'badge-primary' : 'badge-secondary' ?>">
                            <?= $user['role'] ?>
                        </p>
                    </div>
                    <div>
                        <label for="sex">Sex:</label>
                        <p class="badge <?= $user['sex'] === 'MALE' ? 'badge-info' : 'badge-danger' ?>">
                            <?= $user['sex'] ?>
                        </p>
                    </div>
                    <div>
                        <label for="status">Status:</label>
                        <p class="badge <?= $user['status'] === 'PENDING' ? 'badge-warning' : ($user['status'] === 'VALID' ? 'badge-success' : 'badge-danger') ?>">
                            <?= $user['status'] ?>
                        </p>
                    </div>
                </div>
                <div>
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName" value="<?= $user['firstName']; ?>"><br>
                </div>

                <div>
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName" value="<?= $user['lastName']; ?>"><br>
                </div>
                <div>
                    <label for="password">NewPassword:</label>
                    <input type="password" id="password" name="password"><br>
                </div>
                <div>
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword"><br>
                </div>
                <div>
                    <label for="birthDate">Birth Date:</label>
                    <input type="date" id="birthDate" name="birthDate" value="<?php echo $user['birthDate']; ?>">
                </div>

                <div>
                    <label for="profilePicture">Profile Picture:</label>
                    <input type="file" name="profilePicture" id="profilePicture" accept="image/*" onChange="previewInputImage(event)">
                    <input type="hidden" name="currentPicture" value="<?= $user['profilePicture'] ?>">
                    <img id="previewImage" src="<?= ImageUtility::getUserProfilePicture($user); ?>" alt="Preview" style="width: 30px; height: auto;">
                </div>

                <button type="submit" name="submit">Update</button>
            </form>
        </div>
        <?php
    }

    private function showUserFavoriteVehicules()
    {
        $userController = new UserController();
        $userFavoriteVehicules = $userController->getUserFavoriteVehicules($_SESSION['USER']['id']);
        if (count($userFavoriteVehicules) == 0) {
        ?>
            <p>No Favorite Vehicles</p>
        <?php
            return;
        } else {
        ?>
            <h1>Favorite Vehicles</h1>
        <?php
        }
        ?>

        <div class="vehicles__list">
            <?php
            foreach ($userFavoriteVehicules as $vehicule) {
            ?>
                <div class="vehicle__info__card">
                    <a href="/CarLog/vehicule/?id=<?= $vehicule["id"] ?>" style="height:50%;">
                        <img src="<?= ImageUtility::getVehiculePicture($vehicule); ?>" alt="<?php echo $vehicule['vehiculePicture'] ?>" width="100%" height="100%;" style="border-radius: 5px;object-fit:cover">
                    </a>
                    <p>
                        <b>Model:</b>
                        <?= $vehicule['model']; ?>
                    </p>
                    <p>
                        <b>Version:</b>
                        <?= $vehicule['version']; ?>
                    </p>
                    <p>
                        <b>Year:</b>
                        <?= $vehicule['year']; ?>
                    </p>
                    <a href="/CarLog/vehicule/?id=<?php echo $vehicule["id"] ?>"> Show Details </a>
                </div>
                
            <?php
            } ?>
        </div>
<?php
    }


    private function showMyReviews()
    {
    }
}
