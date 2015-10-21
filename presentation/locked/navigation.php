        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <div class="logo"><img src="img/logoKEG.png" alt=""/></div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#hoofdmenu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="mobilelogo">KEG Gistel <img src="img/logoKEG.png" alt=""/></div>
            </div>
            <div class="collapse navbar-collapse" id="hoofdmenu">
                <div class="logo"><h1>KEG Gistel</h1></div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php"<?php if (!isset($_GET['page'])) { print ' class="active"'; } ?>>Home</a></li>
                    <li><a href="index.php?page=ploegen"<?php if (isset($_GET['page'])&&$_GET['page']=='ploegen') { print ' class="active"'; } ?>>Ploegen</a></li>
                    <li><a href="index.php?page=fotogalerij"<?php if (isset($_GET['page'])&&$_GET['page']=='fotogalerij') { print ' class="active"'; } ?>>Fotogalerij</a></li>
                    <li><a href="index.php?page=sponsors"<?php if (isset($_GET['page'])&&$_GET['page']=='sponsors') { print ' class="active"'; } ?>>Sponsors</a></li>
                    <li><a href="index.php?page=documenten"<?php if (isset($_GET['page'])&&$_GET['page']=='documenten') { print ' class="active"'; } ?>>Documenten</a></li>
                    <li><a href="index.php?page=faq"<?php if (isset($_GET['page'])&&$_GET['page']=='faq') { print ' class="active"'; } ?>>FAQ</a></li>
                </ul>
            </div>
        </nav>
