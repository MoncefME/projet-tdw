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
        <div class="page-not-found">
            <h1>You are not Authorized to access this page</h1>
            <p>Please <a href="/CarLog/loginPage">Login</a> to gain access !</p>
        </div>
        <?php
    }
}
