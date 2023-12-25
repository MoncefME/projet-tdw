<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class ContactPage
{
    public function showPage()
    {
        $shardViews = new SharedViews();
        $shardViews->showHeader();
        echo 'ContactPage';
        $this->showContactInformations();
        $shardViews->showFooter();
    }
    private function showContactInformations()
    {
        ?>
        <div class="contact-informations">
            <div class="contact-informations__address">
                <h3>Address</h3>
                <p>Str. Mihai Eminescu, nr. 1, Iasi, Romania</p>
            </div>
            <div class="contact-informations__phone">
                <h3>Phone</h3>
                <p>0745 123 456</p>
            </div>

        </div>
        <?php
    }
}
