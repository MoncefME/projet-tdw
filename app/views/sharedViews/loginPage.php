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
            <div class="error__message">
                <?php echo $_SESSION['LOGIN-MESSAGE']; ?>
            </div>
            <?php
            unset($_SESSION['LOGIN-MESSAGE']);
        }
    }

    private function renderLoginForm()
    {
        ?>
        <div class="login__page">
            <form method="POST" action="<?= ApiRouter::LOGIN_ENDPOINT ?>" class="login__form">
                <div class="login__form__header">
                    <h1>Login</h1>
                    <img src="<?= CARLOG_LOGO ?>" alt="logo" width="40%" height="auto" onclick="location.href='/CarLog/'" />
                </div>
                <div class=" login__form__inputs">
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
                    <?php $this->showLoginError(); ?>
                    <div>
                        <button type="submit">Login</button>
                    </div>
                </div>
                <a href="/CarLog/signUpPage/">New member? Sign up here</a>
            </form>
        </div>
        <?php
    }
}
