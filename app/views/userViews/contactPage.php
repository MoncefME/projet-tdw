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
        <div class="contactpage__container">
            <div class="contact__form">
                <form>
                    <div>
                        <input type="text" name="name" placeholder="Name" />
                    </div>
                    <div>
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
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Address : </span>
                        <p>Oued Semar , Algiers </p>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <span>Phone : </span>
                        <p>+213 553383214</p>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <span>Email : </span>
                        <p>ka_moussaoui@esi.dz</p>
                    </li>
                    <li>
                        <i class="fas fa-globe"></i>
                        <span>Website : </span>
                        <p>www.carlog.com</p>
                    </li>
                    <li>
                        <i class="fab fa-facebook"></i>
                        <span>Facebook</span>
                        <p><a href="github.com/MoncefME">Facebook</a></p>
                    </li>
                    <li>
                        <i class="fab fa-twitter"></i>
                        <span>Twitter</span>
                        <p><a href="github.com/MoncefME">Twitter</a></p>

                    </li>
                </ul>
            </div>
        </div>
        <?php
    }
}
