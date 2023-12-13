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
            echo '<p class="error-message">' . $_SESSION['LOGIN-MESSAGE'] . '</p>';
            unset($_SESSION['LOGIN-MESSAGE']);
        }
    }

    private function renderLoginForm()
    {
        $this->showLoginError();
        ?>
        <form method="POST" action="/CarLog/app/api/auth/login.php">
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
        </form>
        <?php
    }
}
