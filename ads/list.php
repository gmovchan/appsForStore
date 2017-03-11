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
      $result = mysql_query ("SELECT * FROM ads ORDER BY `ads`.`id` DESC",$link);
      $num_rows = mysql_num_rows($result);
    ?>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
            <a href="add.php"><button type="button" class="btn btn-default"
              >Добавить объявление</button></a>
              <a href="../update_prices/index.php"><button type="button" class="btn btn-default"
                >Загрузить цены на сайт</button></a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-12">
            <div>
                <?php echo "<p>Всего объявлений: $num_rows</p>" ?>
            </div>
          <table class="table table-bordered">
            <?php
            while(($row=mysql_fetch_array($result))!==false) {
              $name = $row['name'];
              $date = $row['date'];
              $id = $row['id'];
              $sku = $row['sku'];
              echo '
              <tr>
              <td>
              <a href="view_add.php?sku=' . $sku . '&id=' . $id . '">'
              . $name . '</a>
              </td>
              <td>
              ' . $date . '
              </td>
              <td>
              <a href="edit.php?id=' . $id . '">Изменить</a>
              </td>
              <td>
              <a href="del.php?id=' . $id . '">Удалить</a>
              </td>
              </tr>
              ';
            }
            ?>
          </table>
        </div>
      </div>

    </div>

    <?php
      mysql_close($link);
    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
