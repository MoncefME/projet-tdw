<?php
class SignUpPage
{
    public function showPage()
    {
        $this->renderSigUpForm();
    }

    private function showSignUpMesage()
    {
        if (isset($_SESSION['SIGNUP-MESSAGE'])) {
?>
            <div class="error__message">
                <?php echo $_SESSION['SIGNUP-MESSAGE']; ?>
            </div>
        <?php
            unset($_SESSION['SIGNUP-MESSAGE']);
        }
    }

    private function renderSigUpForm()
    {

        ?>
        <div class="login__page">
            <form method="POST" action="<?= ApiRouter::SIGNUP_ENDPOINT ?>" class="signup__form" enctype="multipart/form-data">
                <div class="login__form__header">
                    <h1>Signup</h1>
                    <img src="<?= CARLOG_LOGO ?>" alt="logo" width="40%" height="auto" onclick="location.href='/CarLog/'" />
                </div>
                <div class="signup__form__inputs">
                    <?php $this->showSignUpMesage(); ?>
                    <div>
                        <label for="username">
                            <i class="fas fa-envelope"></i>
                            username
                        </label>
                        <input type="text" name="username" id="username" placeholder="Enter your username" required />
                    </div>
                    <div>
                        <label for="password">
                            <i class="fas fa-lock"></i>
                            Password
                        </label>
                        <input type="password" name="password" id="password" placeholder="Enter your password" required />
                    </div>
                    <div>
                        <label for="firstName">
                            <i class="fas fa-user"></i>
                            First Name</label>
                        <input type="text" name="firstName" id="firstName" placeholder="Enter your first name" required />
                    </div>
                    <div>
                        <label for="lastName">
                            <i class="fas fa-user"></i>
                            Last Name</label>
                        <input type="text" name="lastName" id="lastName" placeholder="Enter your last name" required />
                    </div>
                    <div class="signup__inputs__group">
                        <div>
                            <label for="sex">Sex
                            </label>
                            <select name="sex" id="sex" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div>
                            <label for="birthDate">Birth Date</label>
                            <input type="date" name="birthDate" id="birthDate" required />
                        </div>
                        <!-- <div>
                            <input type="file" name="profilePicture" id="profilePicture" accept="image/*" />
                        </div> -->
                        <div>
                            <label for="profilePicture">Profile Picture:</label>
                            <input type="file" name="profilePicture" id="profilePicture" accept="image/*" onChange="previewInputImage(event)">
                            <img id="previewImage" src="#" alt="Preview" style="width: 30px; height: auto;display:hidden;">
                        </div>
                    </div>
                    <div>
                        <button type="submit">Register</button>
                    </div>
                </div>
                <a href="/CarLog/loginPage/">Already a member? Login Here</a>
            </form>
        </div>
<?php
    }
}
