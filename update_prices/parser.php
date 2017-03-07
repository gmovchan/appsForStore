<?php
  session_start();
  if (!$_SESSION["AUTH"]) {
    include_once("forwarding.js");
    die;
  }

  function startParse()
  {
    $debug = $_POST["debug"];
    require_once("config.php");

    $link = mysql_connect($host, $user, $password) or die("Не удалось подключится
    к MySQL".mysql_error());
    mysql_select_db($db, $link) or die("Не удлаось подключится к БД".mysql_error());
    mysql_set_charset (utf8);

    $handle = fopen('php://memory', 'w+');
    fwrite($handle, iconv('CP1251', 'UTF-8', file_get_contents('./files/price.csv')));
    rewind($handle);

    echo "<h3>Старт обновления цен...</h3>";

    while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
      $skuPrice = $data[0];
      $price = $data[3];
      $name = $data[1];

      $price = str_replace(",", ".", $price);
      $priceRound = round($price, 2);

      if (!is_numeric($skuPrice)) {
/*        echo "<br>continue ".$skuPrice."<br>";
        continue; */
      } else {

        $oc_product_query = mysql_query("SELECT * FROM `oc_product` WHERE `sku`
          = $skuPrice;", $link);

        $oc_product = mysql_fetch_array($oc_product_query);

        $id = $oc_product["product_id"];

        if ($id) {
          $oc_product_description_query = mysql_query("SELECT * FROM `oc_product_description` WHERE `product_id`
            = $id", $link);

          $oc_prod_desc = mysql_fetch_array($oc_product_description_query);
        }

        $skuInBD = $oc_product["sku"];

        $oldPriceRound = round($oc_product[14], 2);

        $skuBD = $oc_product["sku"];


        if ($oc_product) {
          if ($oldPriceRound != $priceRound) {

            echo "<p><font color='green'>Цена у товара арт: " . $oc_product["sku"] . "
            - «" . $name . "» с " . $oldPriceRound . " руб на " .
            $priceRound . " руб";

            if ($debug) {
              echo "(id: " . $id . ", sku in price: " . $skuPrice .
              ", sku in BD: $skuBD, name in BD: «" . $oc_prod_desc["name"] . "»)";
            }

            echo "</font></p>";

          } else {

            echo "<p>Цена у товара арт: " . $oc_product["sku"] . "
            - «" . $name . "» не изменилась ";

            if ($debug) {
              echo "(id: " . $id .
              ", sku in price: " . $skuPrice . ", sku in BD: $skuBD, name in BD: «"
               . $oc_prod_desc["name"] . "», старая цена: " . $oldPriceRound .
               ", новая цена: " . $price . ")";
            }

             echo "</p>";
          }
        } else {
          echo "<p><font color='red'>Товар арт. " . $skuPrice . " - " . $name . " отсутствует на сайте</font></p>";
        }

        $query = mysql_query("UPDATE `oc_product`
                              SET `price` = $price
                              WHERE `sku` = $skuPrice;", $link);

/*        if (array_search($skuPrice, $skuForChangeName)) {
          $query = mysql_query("UPDATE `oc_product`
                                SET `price` = $price
                                WHERE `sku` = $skuPrice;", $link);

      } */


//черновик запросов
/*
      SELECT oc_product_description.name FROM oc_product JOIN oc_product_description ON
      oc_product_description.product_id=oc_product.product_id WHERE
      oc_product.sku = $sku

      UPDATE oc_product_description SET name = $newName FROM oc_product JOIN oc_product_description ON
      oc_product_description.product_id=oc_product.product_id WHERE
      oc_product.sku = $sku
*/
//конец черновика
      }

    }

    echo "<p><h3>Цены успешно изменены</h3></p>";

    fclose($handle);
    mysql_close($link);
  }

?>
