<?php
  session_start();
  if (!$_SESSION["AUTH"]) {
    include_once("forwarding.js");
    die;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <br>
    <div class="container">
      <div class="row">
          <form class="" action="add_save.php" method="post">
            <div class="form-group col-xs-12">
              <p>
              <div class="row">
                <div class="control-group required">
                  <div class="col-xs-2">

                      <label class="control-label" for="name">Наименование</label>

                  </div>
                  <div class="col-xs-10">

                      <input class="form-control" type="text" name="name" value="" maxlength="50">

                  </div>
                </div>
              </div>
            </p>
              <p>
              <div class="row">
                <div class="control-group required">
                  <div class="col-xs-2">

                      <label class="control-label" for="sku">Артикулы</label>

                  </div>
                  <div class="col-xs-10">

                      <input class="form-control" type="text" name="sku" value="" placeholder="вводить через запятую">

                  </div>
                </div>
              </div>
              </p>
              <div class="row">
                <div class="col-xs-2">
                  <label for="">
                    Оформление
                  </label>
                </div>
                <div class="col-xs-10">
                  <p>
                    <button type="button" class="btn btn-default" id="btnBold">
                      <span class="glyphicon glyphicon-bold" aria-hidden="true"></span>
                    </button>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="control-group required">
                  <div class="col-xs-2">
                    <label for="description" class="control-label">Текст объявления</label>
                  </div>
                  <div class="col-xs-10">
                    <p>
                      <textarea class="form-control" name="description" rows="30" cols="80" id="mytextarea"><?php
                          include_once("config.php");

                          $link = mysql_connect($hostAd, $userAd, $passwordAd) or die("Не удалось
                            подключиться к MySQL" . mysql_error());
                          mysql_select_db($dbAd, $link) or die("Не удалось
                            подключиться к MySQL" . mysql_error());
                          mysql_set_charset (utf8);
                          $lastAd = mysql_query ("SELECT * FROM ads ORDER BY
                            id DESC LIMIT 1",$link);

                          $lastAd = mysql_fetch_array($lastAd);
                          $description = $lastAd["description"];

                          echo strip_tags($description);
                          mysql_close($link);
                        ?></textarea>
                    </p>
                    <p>
                      <button type="submit" class="btn btn-default">
                        Добавить
                      </button>
                    </p>
                  </div>
              </div>
              </div>
            </div>
          </form>

      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./scripts/formatting.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
