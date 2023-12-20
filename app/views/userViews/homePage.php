<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/CarLog/app/controllers/userController.php');
class HomePage
{
    public function showPage()
    {
        $this->showHeader();
        $this->showSlider();
        $this->showNavBar();
        $this->showComparator();
    }

    private function showHeader()
    {
        ?>
        <div class="header">
            <div class="header-logo">
                <img src="/CarLog/public/icons/logos/Black logo - no background.png" alt="logo" width="200" height="auto">
            </div>
            <div class="header__login">
                <?php if (isset($_SESSION['USER'])) { ?>
                    <a href="/CarLog/app/api/auth/logout.php" class="btn btn-danger">Logout</a>
                    <a href="/CarLog/profilePage/" class="btn btn-secondary">Profile</a>
                <?php } else { ?>
                    <a href="/CarLog/loginPage/" class="btn btn-primary">Log In</a>
                <?php } ?>
            </div>
        </div>
        <?php
    }

    private function showSlider()
    {
        ?>
        <div class="slider">
            <p>This is a slider</p>
        </div>
        <?php
    }

    private function showNavBar()
    {
        ?>
        <div class="navbar">
            <ul>
                <li><a href="#">Brands</a></li>
                <li><a href="#">Comparator</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Guide d'achat</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Reviews</a></li>
            </ul>
        </div>
        <?php
    }

    private function showComparator()
    {
        ?>
        <div class="comparator">
            <p>This is a Comparator</p>
        </div>
        <?php
    }
}
