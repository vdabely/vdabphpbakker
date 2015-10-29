
<div class="wrapper clearfix">
    <div class="txtC"><h1>Uitloggen</h1></div>
    </ul>
    
</div>
<?php
    if (isset($_SESSION['LoginC'])) {
        loginservice::logout();
        header("Location: index.php");    
    }
?>
