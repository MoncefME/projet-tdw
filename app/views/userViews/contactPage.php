<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class ContactPage
{

    public function showPage()
    {
        $shardViews = new SharedViews();
        ?>
        <div class="page__content">
            <?php
            $shardViews->showHeader();
            $this->showContactInformations();
            $shardViews->showFooter();
            ?>
        </div>
        <?php
    }
    private function showContactInformations()
    {
        ?>
        <div class="contact__informations__container">
            <?php
            foreach ($this->contactInformations as $key => $value) {
                ?>
                <div class="contact__information">
                    <div class="contact__information__key">
                        <?php echo $key; ?>
                    </div>
                    <div class="contact__information__value">
                        <?php echo $value; ?>
                    </div>
                </div>
                <?php
            }

            ?>
        </div>
        <?php
    }

    private $contactInformations = [
        "email" => "ka_moussaoui@esi.dz",
        "phone" => "0553383214",
        "address" => "Alger, Algerie"
    ];
}
