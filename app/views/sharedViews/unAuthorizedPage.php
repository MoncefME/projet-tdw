<?php
class UnAuthorizedPage
{
    public function showPage()
    {

        ?>
        <p>You are not Authorized to access this page ,<a href="/CarLog/loginPage">Login</a> to do so</p>
        <?php
    }
}
