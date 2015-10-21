<?php
/*
 * HIER KOMT DE HTML PAGINA
 */

// GAMELIJST = $gamelijst
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, intitial-scale=1.0">
    <title>Scrum project in Bootstrap</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"  />
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css"  />
  </head>
  <body>
    <!--Start HEADER-->	
    <?php include('presentation/locked/header.php') ?>
    <!--Start HOOFDMENU-->		
    <?php include('presentation/locked/navigation.php') ?>
    <!--Start jumbotron EYECATCHER-->	
    <?php include('presentation/locked/jumbotron.php') ?>
    <!--Start sectie LIJST-->			
    <section>			
      <div class="container-fluid" id="gamelijst">
        <div class="row">
          <div class="col-md-2">
          </div>	
          <div class="col-md-4">
        <!-- FORM FOR NEW GAME -->
        <h1>Maak een nieuwe game aan</h1>
        <form name="newgame" method="post" action="index.php">
          <label for="newgame_grootte" class="required">grootte</label>
          <select name="grootte">
            <option value="5">5x5</option>
            <option value="6">6x6</option>
            <option value="7">7x7</option>
            <option value="8">8x8</option>
            <option value="9">9x9</option>
            <option value="10">10x10</option>
          </select>
          <input type="submit" id="newgame_bevestig" value="Bevestig">
        </form>
          </div>
          <div class="col-md-4">
          </div>
        <div class="col-md-2">
          </div>
        </div>
      </div>
    </section>
    <!--Start sectie SPELREGELS-->			
    <?php include('presentation/locked/spelregels.php'); ?>
    <!--Start FOOTER-->			
    <?php include("presentation/locked/footer.php") ?>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


