        <div class="wrapper clearfix">
            <div class="txtC">
                <h1>Bestel bij de lokale bakker.</h1>
<?php
if(!isset($_SESSION['LoginC'])) {
?>
                <a title="Registreer u nu" class="button" href="index.php?page=registreer">
                    <span>Registreer</span>
                </a>
                <a title="Log nu in" class="button" href="index.php?page=login">
                    <span>Inloggen</span>
                </a>
<?php
}
if(isset($_SESSION['LoginC'])&&$_SESSION['LoginC']!=1) {
?>
                <a title="Bestel nu" class="button" href="index.php?page=bestelling">
                    <span>Bestellen</span>
                </a>
                <a title="Besteloverzicht" class="button" href="index.php?page=besteloverzicht">
                    <span>Bestel overzicht</span>
                </a>
<?php
}
if(isset($_SESSION['LoginC'])&&$_SESSION['LoginC']==1) {
?>
                <a title="Klanten" class="button" href="index.php?page=klanten">
                    <span>Klanten</span>
                </a>
                <a title="Overzicht" class="button" href="index.php?page=overzicht">
                    <span>Overzicht</span>
                </a>
<?php } ?>
            </div>
        </div>
