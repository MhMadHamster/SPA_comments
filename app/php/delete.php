<?php

  require_once "connect.php";

  $pid = $_POST["deleteId"];

  $delete_id = "DELETE FROM `$posts` WHERE pid IN ( SELECT child FROM ( SELECT child FROM `$posts` JOIN `$links` ON `$posts`.pid = `$links`.child WHERE `$links`.parent = '$pid' ) AS tmptable )";
  $delete_links = "DELETE FROM `$links` WHERE child IN ( SELECT child FROM ( SELECT child FROM `$links` WHERE parent = '$pid' ) AS tmptable )";

  $tmp_result = $connection->query($delete_id);

  if ($tmp_result) {
    $tmp_result = $connection->query($delete_links);
    if ($tmp_result) {
      echo "query successfull";
    } else {
      echo "query fails";
    }
  } else {
    echo "query fails";
  }

?>