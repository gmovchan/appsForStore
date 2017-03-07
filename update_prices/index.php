<?php
  session_start();
  if (!$_SESSION["AUTH"]) {
    include_once("forwarding.js");
    die;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>
      Чтобы обновить цены, надо загрузить прайс MS Excel в формате "CSV (разделители - запятые)"
    </p>
    <form enctype="multipart/form-data" class="" action="upload.php" method="post">
      <p>
      </p><input type="file" name="uploadfile">
      <p>
        <span>Отладка </span><input type="checkbox" name="debug" value="true">
      </p>
      <p>
      </p><input type="submit" value="Отправить">
    </form>
  </body>
</html>
