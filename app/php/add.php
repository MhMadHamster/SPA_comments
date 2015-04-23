<?php

  require_once "connect.php";

  $author = $_POST["newAuthor"];
  $comment = $_POST["newComment"];
  $parent = $_POST["newParent"];

  if ($parent == 0) {
    $parent = 'NULL';
  } else {
    $parent = "'" . $parent . "'";
  }

  $new_entry = "INSERT INTO `$posts` (`parent`, `author`, `post`) VALUES ($parent, '$author', '$comment')";
  $connection->query($new_entry);

  $new_entry_id = $connection->insert_id;

  $new_link = "INSERT INTO `$links` (`parent`, `child`) SELECT `parent`, '$new_entry_id' FROM `$links` WHERE child = $parent UNION ALL SELECT '$new_entry_id', '$new_entry_id'";
  $connection->query($new_link);

  echo $new_entry_id;

?>