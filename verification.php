<?php
  session_start();

  $access = array();
  $access = file("access.php");

  $login = trim($access[1]);
  $passw = trim($access[2]);

  header("Content-Type: text/html; charset=utf-8");

  if (!empty($_POST['enter'])) {
    $_SESSION["login"] = md5($_POST["login"]);
    $_SESSION["passw"] = md5($_POST["passw"]);
  }

  if (empty($_SESSION["login"]) or $login != $_SESSION["login"]
    or $passw != $_SESSION['passw']) {
    $_SESSION["AUTH"] = FALSE;
    include_once("index.php");
    die;
  } else {
    $_SESSION["AUTH"] = TRUE;
    include_once("forwarding.js");
    die;
  }
?>
