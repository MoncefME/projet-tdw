<?php
class ProfilePage
{
    public function showPage()
    {
        echo 'ProfilePage';
        $this->showUserInformation();
    }

    private function showUserInformation()
    {
        $user = $_SESSION['USER'];
        ?>
        <form class="login-form">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br>

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo $user['firstName']; ?>"><br>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo $user['lastName']; ?>"><br>

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

            <label for="profilePicture">Profile Picture:</label>
            <img src="<?php echo $user['profilePicture']; ?>" alt="Profile Picture"><br>
        </form>
        <?php
    }


}
