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
        <div class="page-not-found">
            <h1>Page Not Found</h1>
            <p>Go back to <a href="/CarLog/homePage/">Home</a></p>
        </div>
        <?php
    }

}
