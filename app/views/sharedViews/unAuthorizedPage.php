<?php
class UnAuthorizedPage
{
    public function showPage()
    {
        $this->renderAunAuthorizedPage();
    }

    private function renderAunAuthorizedPage()
    {
        ?>
        <div class="shared__pages">
            <div>
                <img src="<?= CARLOG_LOGO ?>" alt="logo" width="40%" height="auto" onclick="location.href='/CarLog/'" />
                <h1>You are not Authorized to access this page</h1>
                <i class="fas fa-exclamation-triangle" style="font-size: xx-large;"></i>
                <p>Please <a href="/CarLog/loginPage">Login</a> to gain access !</p>
            </div>
        </div>
        <?php
    }
}
