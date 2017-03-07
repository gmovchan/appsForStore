<?php
  session_start();
  if (!$_SESSION["AUTH"]) {
    include_once("forwarding.js");
    die;
  }

  require_once './parser.php';

  $uploaddir = './files/';
  $uploadfile = "./files/price.csv";

  if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
  {
  echo "<h3>Файл успешно загружен на сервер</h3>";
  echo "<p><font color='blue'>Товар, чья цена изменилась, будет выделен зелёным</font></p>";
  }
  else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }

  startParse();

?>
