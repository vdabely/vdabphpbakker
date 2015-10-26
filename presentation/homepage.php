<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"  />
    <link rel="stylesheet" type="text/css" href="css/elystyle.css"  />
    <title>Lokale Bakker</title>
</head>
<body>
<!-- ********  ALL-Container  ******** -->
    <div class="container">
<!-- ********  HEADER-Container  ******** -->
        <?php include('presentation/locked/header.php') ?>
<!-- ********  CONTENT-Container  ******** -->
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $file = 'presentation/'.$page.'.php';
            if (file_exists($file)) {
                if (isset($_COOKIE['LoginC'])) {
                    $klantID = $_COOKIE['LoginC'];
                    include ($file);
                }
                if (!isset($_COOKIE['LoginC'])&&($page=='registreer'||$page=='login'||$page=='faq')) {
                    include ($file);
                }
            }
        }
        if (!isset($_GET['page'])||!file_exists($file)) {
            include ('presentation/home.php');
        }
        ?>
<!-- ********  Footer-Container  ******** -->
        <?php include('presentation/locked/footer.php') ?>
    </div>
</body>
</html>