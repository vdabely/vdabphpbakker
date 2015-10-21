
<div class="wrapper clearfix">
    <div class="txtC"><h1>Uitloggen</h1></div>
    </ul>
    
</div>
<?php
    if (isset($_COOKIE['LoginC'])) {
        session_destroy();
        setcookie('LoginC','',time()-3600);
        header('Refresh: 1; url=index.php');
        die();
    }
?>
