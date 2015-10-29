        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#hoofdmenu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo"><h1>Lokale bakker</h1></div>
            </div>
            <div class="collapse navbar-collapse" id="hoofdmenu">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"<?php if (!isset($_GET['page'])) { print ' class="active"'; } ?>>Home</a></li>
<?php if(isset($_SESSION['LoginC'])&&$_SESSION['LoginC']==1) { ?>
                    <li><a href="index.php?page=klanten"<?php if (isset($_GET['page'])&&$_GET['page']=='users') { print ' class="active"'; } ?>>Klanten</a></li>
                    <li><a href="index.php?page=overzicht"<?php if (isset($_GET['page'])&&$_GET['page']=='overzicht') { print ' class="active"'; } ?>>Overzicht</a></li>
<?php
}
if(!isset($_SESSION['LoginC'])) { 
?>
                    <li><a href="index.php?page=registreer"<?php if (isset($_GET['page'])&&$_GET['page']=='registreer') { print ' class="active"'; } ?>>Registreren</a></li>
                    <li><a href="index.php?page=login"<?php if (isset($_GET['page'])&&$_GET['page']=='login') { print ' class="active"'; } ?>>Inloggen</a></li>
<?php 
}
if(isset($_SESSION['LoginC'])&&$_SESSION['LoginC']!=1) {
?>
                    <li><a href="index.php?page=bestelling"<?php if (isset($_GET['page'])&&($_GET['page']=='bestel'||$_GET['page']=='bestelling'||$_GET['page']=='afrekenen'||$_GET['page']=='wijzigen')) { print ' class="active"'; } ?>>Bestellen</a></li>
                    <li><a href="index.php?page=besteloverzicht"<?php if (isset($_GET['page'])&&$_GET['page']=='besteloverzicht') { print ' class="active"'; } ?>>besteloverzicht</a></li>
<?php 
}
if(isset($_SESSION['LoginC'])||(isset($_SESSION['LoginC'])&&$_SESSION['LoginC']==1)) {
?>
                    <li><a href="index.php?page=logout"<?php if (isset($_GET['page'])&&$_GET['page']=='logout') { print ' class="active"'; } ?>>Uitloggen</a></li>
<?php
}
if(!isset($_SESSION['LoginC'])) { 
?>
                    <li><a href="index.php?page=faq"<?php if (isset($_GET['page'])&&$_GET['page']=='faq') { print ' class="active"'; } ?>>F.A.Q.</a></li>
<?php } ?>
                </ul>
            </div>
        </nav>