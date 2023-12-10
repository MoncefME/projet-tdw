<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class LoginPage
{
    public function showPage()
    {
        $this->loginForm();
    }

    public function loginForm()
    {
        ?>
        <form method="POST" action="/CarLog/app/api/auth/login.php">
            <div>
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required />
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required />
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
        <?php
    }
}
