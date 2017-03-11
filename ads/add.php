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
        <div class="container-fluid">
            <form class="form-horizontal col-md-12" action="add_save.php" method="post">
                <div class="form-group">

                    <label class="control-label col-md-2" for="name">Наименование</label>

                    <div class="col-md-8">

                        <input class="form-control" type="text" name="name" value="" maxlength="50">

                    </div>
                </div>
                <div class="form-group">

                    <label for="" class="control-label col-md-2">Оформление текста</label>

                    <div class="col-md-8">
                        <button type="button" class="btn btn-default" id="btnBoldTop">
                            <span class="glyphicon glyphicon-bold" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
                <div class="form-group">

                    <label for="description" class="control-label col-md-2">Текст в начале объявления</label>

                    <div class="col-md-8">
                        <textarea class="form-control" name="descriptionTop" rows="10" cols="80" id="mytextareaTop"><?php
                            include_once("config.php");

                            $link = mysql_connect($hostAd, $userAd, $passwordAd) or die("Не удалось
                                                подключиться к MySQL" . mysql_error());
                            mysql_select_db($dbAd, $link) or die("Не удалось
                                                подключиться к MySQL" . mysql_error());
                            mysql_set_charset(utf8);
                            $lastAd = mysql_query("SELECT * FROM ads ORDER BY
                                                id DESC LIMIT 1", $link);

                            $lastAd = mysql_fetch_array($lastAd);
                            $description_top = $lastAd["description_top"];

                            echo strip_tags($description_top);
                            ?></textarea>
                    </div>
                </div>
                <div class="form-group">

                    <label class="control-label col-md-2" for="sku">Артикулы</label>

                    <div class="col-md-8">

                        <input class="form-control" type="text" name="sku" value="" placeholder="вводите через запятую">

                    </div>
                </div>
                <div class="form-group">

                    <label for="" class="control-label col-md-2">Оформление текста</label>

                    <div class="col-md-8">
                        <button type="button" class="btn btn-default" id="btnBold">
                            <span class="glyphicon glyphicon-bold" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
                <div class="form-group">

                    <label for="description" class="control-label col-md-2">Текст в конце объявления</label>

                    <div class="col-md-8">
                        <textarea class="form-control" name="description" rows="30" cols="80" id="mytextarea"><?php
                            include_once("config.php");

                            $description = $lastAd["description"];

                            echo strip_tags($description);
                            mysql_close($link);
                            ?></textarea>
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-md-2"></div>

                    <div class="col-md-8">

                        <button type="submit" class="btn btn-default">
                            Добавить
                        </button>

                    </div>
                </div>
            </form>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="./scripts/formatting.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
