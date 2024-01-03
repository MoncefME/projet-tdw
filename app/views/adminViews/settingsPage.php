<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
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
                <div class="dashboard__header-brands">
                    <h1>Settings Page</h1>
                    <?= $this->showContactForm(); ?>
                </div>

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
            <form action="" method="post">
                <div>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $contactInformations['email']; ?>">
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $contactInformations['phone']; ?>">
                </div>
                <div>
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" value="<?php echo $contactInformations['address']; ?>">
                </div>
                <div>
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" value="<?php echo $contactInformations['website']; ?>">
                </div>
                <div>
                    <label for="facebook_link">Facebook Link</label>
                    <input type="text" name="facebook_link" id="facebook_link"
                        value="<?php echo $contactInformations['facebook_link']; ?>">
                </div>
                <div>
                    <label for="twitter_link">Twitter Link</label>
                    <input type="text" name="twitter_link" id="twitter_link"
                        value="<?php echo $contactInformations['twitter_link']; ?>">
                </div>
                <div>
                    <label for="youtube_link">Youtube Link</label>
                    <input type="text" name="youtube_link" id="youtube_link"
                        value="<?php echo $contactInformations['youtube_link']; ?>">
                </div>
                <div>
                    <label for="linkedin_link">Linkedin Link</label>
                    <input type="text" name="linkedin_link" id="linkedin_link"
                        value="<?php echo $contactInformations['linkedin_link']; ?>">
                </div>
                <div>
                    <label for="instagram_link">Instagram Link</label>
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
            <form action="" method="post">
                <div>
                    <label for="content">Content:</label>
                    <div id="summernote" placeholder="Enter content"></div>
                    <input type="hidden" name="content" id="content">
                </div>
                <button type="submit" name="update_guid_achat">Update</button>
            </form>
        </div>
        <?php
    }
}
