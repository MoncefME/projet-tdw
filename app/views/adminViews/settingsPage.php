<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/controllers/settingsController.php");
class SettingsPage
{
    public function showPage()
    {
        $sharedView = new SharedViews();
        ?>
        <div class="dashboard__page">
            <?php
            $sharedView->adminSideBar();
            ?>
            <div class="dashboard__content">
                <h1>Settings Page</h1>
                <?= $this->showGuidAchatForm(); ?>

            </div>
        </div>
        <?php
    }
    public function showContactForm()
    {
        $settingsController = new SettingsController();
        $contactInformations = $settingsController->getContactInformations();
        ?>
        <div class="contact__informations__form">
            <form action="<?= ApiRouter::EDIT_CONTACT_ENDPOINT ?>" method="post">
                <div>
                    <label for="email">
                        <i class="fas fa-envelope"></i>
                        Email
                    </label>
                    <input type="text" name="email" id="email" value="<?php echo $contactInformations['email']; ?>">
                </div>
                <div>
                    <label for="phone">
                        <i class="fas fa-phone"></i>
                        Phone
                    </label>
                    <input type="text" name="phone" id="phone" value="<?php echo $contactInformations['phone']; ?>">
                </div>
                <div>
                    <label for="address">
                        <i class="fas fa-map-marker-alt"></i>
                        Address
                    </label>
                    <input type="text" name="address" id="address" value="<?php echo $contactInformations['address']; ?>">
                </div>
                <div>
                    <label for="website">
                        <i class="fas fa-globe"></i>
                        Website
                    </label>
                    <input type="text" name="website" id="website" value="<?php echo $contactInformations['website']; ?>">
                </div>
                <div>
                    <label for="facebook_link">
                        <i class="fab fa-facebook"></i>
                        Facebook Link
                    </label>
                    <input type="text" name="facebook_link" id="facebook_link"
                        value="<?php echo $contactInformations['facebook_link']; ?>">
                </div>
                <div>
                    <label for="twitter_link">
                        <i class="fab fa-twitter"></i>
                        Twitter Link
                    </label>
                    <input type="text" name="twitter_link" id="twitter_link"
                        value="<?php echo $contactInformations['twitter_link']; ?>">
                </div>
                <div>
                    <label for="youtube_link">
                        <i class="fab fa-youtube"></i>
                        Youtube Link
                    </label>
                    <input type="text" name="youtube_link" id="youtube_link"
                        value="<?php echo $contactInformations['youtube_link']; ?>">
                </div>
                <div>
                    <label for="linkedin_link">
                        <i class="fab fa-linkedin"></i>
                        Linkedin Link
                    </label>
                    <input type="text" name="linkedin_link" id="linkedin_link"
                        value="<?php echo $contactInformations['linkedin_link']; ?>">
                </div>
                <div>
                    <label for="instagram_link">
                        <i class="fab fa-instagram"></i>
                        Instagram Link
                    </label>
                    <input type="text" name="instagram_link" id="instagram_link"
                        value="<?php echo $contactInformations['instagram_link']; ?>">
                </div>
                <button type="submit" name="update_contact_informations">Update</button>
            </form>
        </div>
        <?php
    }

    public function showGuidAchatForm()
    {
        $settingsController = new SettingsController();
        $guidAchat = $settingsController->getGuideAchat();
        ?>
        <div class="guid__achat__form">
            <form action="<?= ApiRouter::EDIT_GUIDE_ACHAT_ENDPOINT ?>" method="post">
                <div>
                    <p>Edit Buyer Guide</p>
                    <p>Last modification :
                        <?php echo $guidAchat['updated_at']; ?>
                    </p>
                </div>
                <div>
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo $guidAchat['title']; ?>">
                </div>
                <div>
                    <label>Conten</label>
                    <textarea name="content" cols="30" rows="10"><?php echo $guidAchat['content']; ?></textarea>
                </div>
                <button class="btn btn-danger" type="submit" name="update_guid_achat">Update</button>
            </form>
        </div>
        <?php
    }
}
