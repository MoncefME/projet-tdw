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
            <div class="error-message">
                <?php echo $_SESSION['SIGNUP-MESSAGE']; ?>
            </div>
            <?php
            unset($_SESSION['SIGNUP-MESSAGE']);
        }
    }

    private function renderSigUpForm()
    {

        ?>
        <div class="signup-page">
            <img src="/CarLog/public/icons/logos/Black logo - no background.png" alt="logo" width="40%" height="auto" />
            <form method="POST" action="/CarLog/app/api/auth/signup.php" class="signup-form">
                <h1>SignUp</h1>
                <div class="signup-form-container">
                    <?php $this->showSignUpMesage(); ?>
                    <div>
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" id="firstName" placeholder="Enter your first name" required />
                    </div>
                    <div>
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" id="lastName" placeholder="Enter your last name" required />
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email" required />
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password" required />
                    </div>
                    <div>
                        <label for="birthDate">Birth Date</label>
                        <input type="date" name="birthDate" id="birthDate" required />
                    </div>
                    <div>
                        <label for="sex">Sex</label>
                        <select name="sex" id="sex" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <input type="file" name="profilePicture" id="profilePicture" accept="image/*" />
                </div>

                <button type="submit">Register</button>
                <a href="/CarLog/loginPage/">Already a member? Login Here</a>
            </form>
        </div>
        <?php
    }

}
