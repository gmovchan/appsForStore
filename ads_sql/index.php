<?php
  header("Content-Type: text/html; charset=utf-8");
  require_once('config.php');

  $mysqli = new mysqli($hostAd, $userAd, $passwordAd, $dbAd);
  if ($mysqli->connect_errno) {
    echo "Извините, возникла проблема на сайте";
    echo "Ошибка: Не удалсь создать соединение с базой MySQL и вот почему: \n";
    echo "Номер_ошибки: " . $mysqli->connect_errno . "\n";
    echo "Ошибка: " . $mysqli->connect_error . "\n";
    exit;
  }

  $sql = "SELECT `sku`, `name` FROM `ads` WHERE 1";

  if (!$result = $mysqli->query($sql)) {
    echo "Извините, возникла проблема в работе сайта.";
    echo "Ошибка: Наш запрос не удался и вот почему: \n";
    echo "Запрос: " . $sql . "\n";
    echo "Номер_ошибки: " . $mysqli->errno . "\n";
    echo "Ошибка: " . $mysqli->error . "\n";
    exit;
  }

  echo "<table border='1px' bordercolor='black'>";
  while ($ad = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$ad['sku']."</td><td>".$ad['name']."</td>";
    echo "</tr>";
  }
  echo "</table>";
  $result->free();
  $mysqli->close();
?>
