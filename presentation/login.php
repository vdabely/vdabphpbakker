<div class="wrapper clearfix txtC">
<?php
if (isset($_POST["login"])) {
    $login = loginservice::login($_POST["login"], $_POST["paswoord"]);
    if ($login) {
        header('Location: index.php?page=bestel');
    } else {
        print ("<div class='txtC'><h1>Foute gegevens of niet meer actief.</h1></div>");
    }
}
?>
</div>
<div class="wrapper clearfix txtC">
<?php if (!isset($_COOKIE['LoginC'])) { ?>
    <div class="txtC"><h1>Inloggen</h1></div>
    <form action="#" method="post">
        <label for="login">Email :&nbsp;</label><input type="text" name="login"></br>
        <label for="paswoord">Paswoord :&nbsp;</label><input type="password" name="paswoord"></br>
        <input type="submit" value="Log in">
    </form>
<?php } ?>
<?php
    if (isset($_COOKIE['LoginC'])) {
        header('Refresh: 1; url=index.php');
        print("<div class='txtC'><h1>U bent al ingelogd.</h1></div>");
        die();
    }
?>
</div>