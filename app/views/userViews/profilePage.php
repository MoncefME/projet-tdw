<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/userController.php");
class ProfilePage
{
    public function showPage()
    {
        $shardViews = new SharedViews();
        $shardViews->showHeader();
        echo '<h1>ProfilePage</h1>';
        $this->showUserInformation();
        if (isset($_SESSION['USER']))
            $this->showUserFavoriteVehicules();
        $shardViews->showFooter();
    }

    private function showUserInformation()
    {
        // $user = $_SESSION['USER'];
        $userController = new UserController();
        $user = $userController->getUserById($_SESSION['USER']['id']);
        $_SESSION['USER'] = $user;
        ?>
        <form class="login-form" action="/CarLog/app/api/users/updateUserInfos.php" method="POST" enctype="multipart/form-data">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br>

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo $user['firstName']; ?>"><br>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo $user['lastName']; ?>"><br>

            <!-- <label for="password">NewPassword:</label>
            <input type="password" id="password" name="password"><br> -->

            <label for="role">Role:</label>
            <div>
                <?php echo $user['role']; ?>
            </div><br>

            <label for="birthDate">Birth Date:</label>
            <input type="date" id="birthDate" name="birthDate" value="<?php echo $user['birthDate']; ?>"><br>

            <label for="sex">Sex:</label>
            <div>
                <?php echo $user['sex']; ?>
            </div><br>

            <label for="status">Status:</label>
            <div>
                <?php echo $user['status']; ?>
            </div><br>

            <div>
                <label for="profilePicture">Profile Picture:</label>
                <input type="file" name="profilePicture" id="profilePicture" accept="image/*"
                    onChange="previewInputImage(event)">
                <input type="hidden" name="currentPicture" value="<?php echo $user['profilePicture'] ?>">
                <img id="previewImage" src="/CarLog/public/uploads/users/<?php echo $user['profilePicture'] ?>" alt="Preview"
                    style="width: 100px; height: 100px;">
            </div>

            <button type="submit" name="submit">Update</button>
        </form>
        <?php
    }

    private function showUserFavoriteVehicules()
    {
        $userController = new UserController();
        $userFavoriteVehicules = $userController->getUserFavoriteVehicules($_SESSION['USER']['id']);

        ?>
        <h1>Fav Vehicles</h1>
        <div class="vehicles">
            <?php
            foreach ($userFavoriteVehicules as $vehicule) {
                ?>
                <div class="vehicle-info">
                    <p>Model:
                        <?php echo $vehicule['model']; ?>
                    </p>
                    <p>Version:
                        <?php echo $vehicule['version']; ?>
                    </p>
                    <p>Year:
                        <?php echo $vehicule['year']; ?>
                    </p>
                    <img src="/CarLog/public/uploads/vehicules/<?php echo $vehicule['vehiculePicture'] ?>"
                        alt="<?php echo $vehicule['vehiculePicture'] ?>" width="50px" height="50px">
                    <a href="/CarLog/vehicule/?id=<?php echo $vehicule["id"] ?>"> Show Details </a>
                </div>
                <?php
            } ?>
        </div>
        <?php
    }


}
