        <div class="wrapper clearfix">
            <div class="txtC">
                <h1>Bestel bij de lokale bakker.</h1>
<?php
if(!isset($_COOKIE['LoginC'])) {
?>
                <a title="Registreer u nu" class="button" href="index.php?page=registreer">
                    <span>Registreer</span>
                </a>
                <a title="Log nu in" class="button" href="index.php?page=login">
                    <span>Inloggen</span>
                </a>
<?php
}
if(isset($_COOKIE['LoginC'])) {
?>
                <a title="Bestel nu" class="button" href="index.php?page=bestelling">
                    <span>Bestellen</span>
                </a>
                <a title="Log nu uit" class="button" href="index.php?page=besteloverzicht">
                    <span>Bestel overzicht</span>
                </a>
<?php } ?>
            </div>
        </div>
