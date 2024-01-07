<?php
class PageNotFound
{
    public function showPage()
    {
        $this->renderPageNotFound();

    }

    private function renderPageNotFound()
    {
        ?>
        <div class="shared__pages">
            <img src="<?= CARLOG_LOGO ?>" alt="logo" width="40%" height="auto" onclick="location.href='/CarLog/'" />
            <h1>Page Not Found</h1>
            <i class="fas fa-exclamation-triangle" style="font-size: xx-large;"></i>
            <p>Go back to <a href="/CarLog/homePage/">Home</a></p>
        </div>
        <?php
    }


}
