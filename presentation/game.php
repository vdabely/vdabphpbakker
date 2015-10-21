
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, intitial-scale=1.0">
    <title>Scrum project in Bootstrap</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"  />
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css"  />
    <link rel="stylesheet" type="text/css" href="css/matrix.css"  />
    <script type="text/javascript">
        function confirm_delete() {
            return confirm("Game <?php print($_GET["game"]); ?> verwijderen?");
        }
    </script>
  </head>
  <body>
    <!--Start HEADER-->	
    <?php include('presentation/locked/header.php') ?>
    <!--Start HOOFDMENU-->		
    <?php include('presentation/locked/navigation.php') ?>
    <!--Start jumbotron EYECATCHER-->	
    <?php include('presentation/locked/jumbotron.php') ?>
    <!--Start sectie ROOSTER-->			
    <section>			
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
             <h1>Game: <?php print $_GET["game"]; ?></h1>
         </div>	   
          <div class="col-md-4">
            <?php
            $game = GameDAO::getGameFromId($_GET["game"]);
            $grootte = $game->grootte;
            $dag = $game->dag;
            print ("<h2>Dag : ".$dag."</h2>");
            $arrPrev = $arrGameOrganismen;
            rasterservice::makeRaster($arrPrev, $grootte);
            ?>
          </div>
          <div class="col-md-4">
            <?php
            $dag += $dag;
            print ("<h2>Dag : ".$dag."</h2>");
            $arrNext = gameService::nextStep($arrPrev);
            rasterservice::makeRaster($arrNext, $grootte);
            ?>
          </div>
          <div class="col-md-2">
          </div>
        </div>
      </div>
    </section>
    <!--Start sectie KNOPPEN-->			
    <section>			
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <p></p>
          </div>
          <div class="col-md-4">
            <a href="index.php?game=<?php print $game->id ?>&nextstep=true" class="btn btn-info btn-lg">
              <span class="glyphicon glyphicon-play"></span> PLAY
            </a>

            <a href="index.php?deletegame=<?php print $game->id ?>" class="btn btn-info btn-lg pull-right" onclick="javascript:confirm_delete();">
              <span class="glyphicon glyphicon-stop"></span> STOP
            </a>
          </div>	
          <div class="col-md-4">
            <p></p>
          </div>					
        </div>
      </div>	
    </section>
    <!--Start FOOTER-->			
    <?php include("presentation/locked/footer.php") ?>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
