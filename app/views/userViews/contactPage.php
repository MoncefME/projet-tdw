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
            $shardViews->showNavBar();
            $this->showContactInformations();
            $shardViews->showFooter();
            ?>
        </div>
    <?php
    }
    private function showContactInformations()
    {
        $contactInformations = new SettingsController();
        $contactInformations = $contactInformations->getContactInformations();
    ?>
        <div class="contactpage__container">
            <div class="contact__form">
                <form>
                    <h2>Send us a message</h2>
                    <div style="display: flex; gap:20px">
                        <input type="text" name="name" placeholder="Name" />
                        <input type="email" name="email" placeholder="Email" />
                    </div>
                    <div>
                        <textarea name="message" placeholder="Message"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-dark">
                            <i class="fas fa-paper-plane"></i>
                            Send
                        </button>
                    </div>
                </form>
            </div>
            <div class="contact__informations">
                <h2>Contact Informations</h2>
                <ul>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:<?= $contactInformations['email'] ?>" target="_blank">
                            <?= $contactInformations['email'] ?>
                        </a>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <a href="tel:<?= $contactInformations['phone'] ?>" target="_blank">
                            <?= $contactInformations['phone'] ?>
                        </a>
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <a href="https://www.google.com/maps/search/?api=1&query=<?= urlencode($contactInformations['address']) ?>" target="_blank">
                            <?= $contactInformations['address'] ?>
                        </a>
                    </li>


                    <li>
                        <i class="fas fa-globe"></i>
                        <a href="<?= $contactInformations['website'] ?>" target="_blank"> Website</a>
                    </li>
                </ul>
                <ul class="sm-links">
                    <li>
                        <a href="<?= $contactInformations['facebook_link'] ?>" target="_blank">
                            <i class="fab fa-facebook h2"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $contactInformations['twitter_link'] ?>" target="_blank">
                            <i class="fab fa-twitter h2"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $contactInformations['youtube_link'] ?>" target="_blank">
                            <i class="fab fa-youtube h2"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $contactInformations['linkedin_link'] ?>" target="_blank">
                            <i class="fab fa-linkedin h2"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $contactInformations['instagram_link'] ?>" target="_blank">
                            <i class="fab fa-instagram h2"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
<?php
    }
}
