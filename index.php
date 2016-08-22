<?php
  session_start();
  header("Content-Type: text/html; charset=utf-8");
  if ($_SESSION["AUTH"]) {
    include_once("verification.php");
    die;
  } else {
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
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/signin.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body>
        <div class="container">

          <form class="form-signin" action="verification.php" method="post">
            <h2 class="form-signin-heading">Пожалуйста войдите</h2>
            <label for="inputEmail" class="sr-only">Логин</label>
            <input type="text" name="login" class="form-control" placeholder="Логин" required autofocus>
            <label for="inputPassword" class="sr-only">Пароль</label>
            <input type="password" name="passw" class="form-control" placeholder="Пароль" required>
            <input type="hidden" name="enter" value="yes">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
          </form>

        </div> <!-- /container -->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
      </body>
    </html>
  <?php
    die;
  }
