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
    <?php
      include_once("config.php");
      $link = mysql_connect($hostAd, $userAd, $passwordAd) or die("Не удалось
        подключиться к MySQL" . mysql_error());
      mysql_select_db($dbAd, $link) or die("Не удалось
        подключиться к MySQL" . mysql_error());
      mysql_set_charset (utf8);
      $name = htmlspecialchars($_POST['name']);     
      $descriptionTop = htmlspecialchars($_POST['descriptionTop']);
      $description = htmlspecialchars($_POST['description']);
      $date = date("o\-m\-d");
      $sku = htmlspecialchars($_POST['sku']);
      $id = $_GET['id'];
      mysql_query ("UPDATE `host6597_ad`.`ads` SET `name` = '$name', `description_top` = '$descriptionTop', `sku` = '$sku', `description` = '$description', `date` = '$date' WHERE `ads`.`id` = '$id'",$link);
      mysql_close($link);
    ?>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          Объявление успешно сохранено.
          <br>
          <a href="list.php">
            <button type="submit" class="btn btn-default">
              К списку
            </button>
          </a>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
