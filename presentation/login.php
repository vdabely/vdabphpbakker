
<?php
if (isset($_POST["login"])) {
    $login = loginservice::login($_POST["login"], $_POST["paswoord"]);
    if ($login) {
        header('Location: index.php?page=home');
    } else {
        print ("<div class='wrapper clearfix txtC'><div class='txtC'><h1>Foute gegevens of niet meer actief.</h1></div></div>");
    }
}
?>

<div class="wrapper clearfix txtC">
<?php if (!isset($_SESSION['LoginC'])) { ?>
    <div class="txtC"><h1>Inloggen</h1></div>
    <form action="#" method="post">
        <label for="login">Email :&nbsp;</label><input type="text" name="login" value="<?php if (isset($_COOKIE['LoginC'])) { print ($_COOKIE['LoginC']); } ?>"></br>
        <label for="paswoord">Paswoord :&nbsp;</label><input type="password" name="paswoord"></br>
        <input type="submit" value="Log in" class="button">
    </form>
<?php } ?>
<?php
    if (isset($_SESSION['LoginC'])) {
        print("<h1>Welkom</h1>");
        include ('presentation/home.php');
    }
?>
</div>