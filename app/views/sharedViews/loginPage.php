<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");

class LoginPage
{
    public function showPage()
    {
        $this->renderLoginForm();
    }

    private function showLoginError()
    {
        if (isset($_SESSION['LOGIN-MESSAGE'])) {
            ?>
            <div class="error-message">
                <?php echo $_SESSION['LOGIN-MESSAGE']; ?>
            </div>
            <?php
            unset($_SESSION['LOGIN-MESSAGE']);
        }
    }

    private function renderLoginForm()
    {
        ?>
        <div class="login-page bg-img">
            <img src="<?= CARLOG_LOGO ?>" alt="logo" width="40%" height="auto" />
            <form method="POST" action="/CarLog/app/api/auth/login.php" class="login-form">
                <h1>Login</h1>
                <?php $this->showLoginError(); ?>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required />
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required />
                </div>
                <div>
                    <button type="submit">Login</button>
                </div>

                <a href="/CarLog/signUpPage/">New member? Sign up here</a>
            </form>
        </div>
        <?php
    }
}
